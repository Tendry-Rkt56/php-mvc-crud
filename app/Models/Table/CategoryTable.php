<?php

namespace App\Models\Table;


class CategoryTable extends Table
{

     public function getAll ()
     {
          $query = "SELECT * FROM category WHERE id > 0";
          return $this->db->getConn()->query($query)->fetchAll(\PDO::FETCH_OBJ);
     }

     public function count ()
     {
          $query = $this->db->getConn()->query("SELECT count(*) FROM category WHERE id > 0");
          return $query->fetchColumn();
     }
     
     public function all (int $limit, int $offset)
     {
          $query = "SELECT * FROM category WHERE id > 0 LIMIT $limit OFFSET $offset";
          $result = $this->db->getConn()->query($query);
          return $result->fetchAll(\PDO::FETCH_OBJ);
     }

     public function create (array $data = [])
     {
          $query = "INSERT INTO category (nom) VALUES (:nom)";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(':nom', $data['nom']);
          $_SESSION['success'] = 'Nouvelle catégorie crée';
          return $result->execute();
     }

     public function find (int $id)
     {
          $query = "SELECT * FROM category WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(':id', $id);
          $result->execute();
          return $result->fetch(\PDO::FETCH_OBJ);
     }

     public function update (int $id, array $data = [])
     {
          $query = "UPDATE category SET nom = :nom WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(":nom", $data['nom'], \PDO::PARAM_STR);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          $_SESSION['success'] = "Catégorie N° $id mise à jour";
          return $result->execute();
     }

     public function delete (int $id): bool
     {
          $query = "DELETE FROM category WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = 'Catégorie supprimée';
          return $result->execute();
     }


}