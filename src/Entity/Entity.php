<?php

namespace App\Entity;

use Config\DataBase;
use Services\Session;

class Entity
{

     protected string $table = '';

     public function __construct(private DataBase $db)
     {
          
     }

     public function getDb()
     {
          return $this->db->getConn();
     }

     public function findAll(): array
     {
          $sql = "SELECT * FROM $this->table WHERE id > 0";
          return $this->getDb()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

     public function delete(int $id, bool $file = false): bool
     {
          $sql = "DELETE FROM $this->table WHERE id = :id";
          $query = $this->getDb()->prepare($sql);
          $file ? removeFile($this->find($id)->image) : '';
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          Session::set('danger', ucfirst($this->table). ' supprimée');
          return $query->execute();
     }

     public function count(): int
     {
          $sql = "SELECT count(*) FROM $this->table WHERE id > :id";
          $query = $this->getDb()->prepare($sql);
          $id = 0;
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetchColumn();    
     }

     public function find(int $id)
     {
          $sql = "SELECT * FROM $this->table WHERE id = :id";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }

}