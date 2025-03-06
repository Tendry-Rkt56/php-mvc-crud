<?php

namespace App\Entity;

use Services\Session;

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

     public function find(int $id)
     {
          $sql = "SELECT a.*, c.id AS category_id FROM articles AS a LEFT JOIN category AS c ON 
               a.category_id = c.id WHERE a.id = :id";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }

     public function create(array $data = []): bool 
     {
          if (isset($data['category']) && !empty($data['category'])) {
               $sql = "INSERT INTO articles(nom, prix, image, category_id) VALUES (:nom, :prix, :image, :category)";
          }
          else $sql = "INSERT INTO articles(nom, prix, image) VALUES (:nom, :prix, :image)";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prix', $data['prix'], \PDO::PARAM_INT);
          $query->bindValue(':image', $data['image'], \PDO::PARAM_STR);
          if (isset($data['category']) && !empty($data['category'])) {
               $query->bindValue(':category', $data['category'], \PDO::PARAM_INT);
          }
          return $query->execute();
     }

     public function update(int $id, array $data = []): bool
     {
          if (isset($data['category']) && !empty($data['category'])) {
               $sql = "UPDATE articles SET nom = :nom, prix = :prix, image = :image, category_id = :category WHERE id = :id";
          }
          else $sql = "UPDATE articles SET nom = :nom, prix = :prix, image = :image WHERE id = :id";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prix', $data['prix'], \PDO::PARAM_INT);
          $query->bindValue(':image', $data['image'], \PDO::PARAM_STR);
          if (isset($data['category']) && !empty($data['category'])) {
               $query->bindValue(':category', $data['category'], \PDO::PARAM_INT);
          }
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          Session::set('success', 'Article N°'.$id. ' mise à jour');
          return $query->execute();
     }


}