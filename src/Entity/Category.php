<?php

namespace App\Entity;

class Category extends Entity
{

     protected string $table = 'category';

     public function getAll(int $limit, int $offset, array $data = [])
     {
          $sql = "SELECT * FROM $this->table WHERE id > :id";
          if (isset($data['nom']) && !empty($data['nom'])) {
               $sql .= " AND nom LIKE :nom";
          }
          $sql .= " LIMIT $limit OFFSET $offset";
          $query = $this->getDb()->prepare($sql);
          $id = 0;
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          if (isset($data['nom']) && !empty($data['nom'])) {
               $query->bindValue(':nom', '%'.$data['nom'].'%', \PDO::PARAM_STR);
          }
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

}