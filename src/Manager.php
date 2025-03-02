<?php

namespace App;

use Config\DataBase;

class Manager 
{

     private static $instance;
     private static $db;
     private array $entities = [];

     public static function getInstance(): self
     {
          if (self::$instance == null) self::$instance = new self();
          return self::$instance;
     }

     public function getDb()
     {
          if (self::$db == null) self::$db = new DataBase('crud');
          return self::$db;
     }

     public function getEntity(string $entity = '')
     {
          if (!array_key_exists($entity, $this->entities)) {
               $this->entities[$entity] = new $entity($this->getDb());
          }
          return $this->entities[$entity];

     }

}