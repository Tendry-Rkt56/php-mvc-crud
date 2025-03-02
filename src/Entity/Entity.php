<?php

namespace App\Entity;

use Config\DataBase;

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

     public function findAll() 
     {
          $sql = "SELECT * FROM $this->table WHERE id > 0";
          return $this->getDb()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

}