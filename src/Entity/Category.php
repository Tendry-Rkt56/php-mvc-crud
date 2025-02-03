<?php

namespace App\Entity;

use Services\Session;

class Category extends Entity
{

     protected string $table = 'category';

     public function getAll(int $limit, int $offset, array $data = []): array | bool
     {
          $sql = "SELECT * FROM $this->table WHERE id > :id";
          if (isset($data['search']) && !empty($data['search'])) {
               $sql .= " AND nom LIKE :search";
          }
          $sql .= " LIMIT $limit OFFSET $offset";
          $query = $this->getDb()->prepare($sql);
          $id = 0;
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          if (isset($data['search']) && !empty($data['search'])) {
               $query->bindValue(':search', '%'.$data['search'].'%', \PDO::PARAM_STR);
          }
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function create(array $data = []): bool
     {
          $sql = "INSERT INTO $this->table(nom) VALUES (:nom)";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          Session::set('success', 'Nouvelle catégorie créée');
          return $query->execute();
     }

     public function update(int $id, array $data = []): bool
     {
          $sql = "UPDATE category SET nom = :nom WHERE id = :id";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          Session::set('success', 'Categorie N°'.$id.' mise à jour');
          return $query->execute();
     }

}