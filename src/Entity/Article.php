<?php

namespace App\Entity;

class Article extends Entity
{

     protected string $table = 'articles';

     public function getAll(int $limit, int $offset, array $data = []): array
     {
          $sql = "SELECT a.*, c.nom AS name FROM articles AS a LEFT JOIN category AS c ON 
               a.category_id = c.id WHERE a.id > :id";
          $id = 0;
          if (isset($data['search'])) {
               $sql .= " AND (a.nom LIKE :search)";
          }
          if (isset($data['category']) && !empty($data['category'])) {
               $sql .= " AND c.id = :categoryId";
          }

          $sql .= " LIMIT $limit OFFSET $offset";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);

          if (isset($data['search'])) {
               $search = '%'.$data['search'].'%';
               $query->bindValue(':search', $search, \PDO::PARAM_STR);
          }
          if (isset($data['category']) && !empty($data['category'])) {
               $query->bindValue(':categoryId', $data['category'], \PDO::PARAM_INT);
          }
          
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function create(array $data = []) 
     {
          $sql = "INSERT INTO articles(nom, prix, image, category_id) VALUES (:nom, :prix, :image, :category)";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prix', $data['nom'], \PDO::PARAM_INT);
          $query->bindValue(':image', $data['nom'], \PDO::PARAM_STR);
     }


}