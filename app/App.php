<?php

namespace App;

use Config\DataBase;

class App 
{

     private static $_db;

     private function getDb ()
     {
          if (self::$_db == null) {
               self::$_db = new DataBase(DB_NAME);
          }
          return self::$_db;
     }

     public function getTable (string $model)
     {
          $table = "\\App\\Models\\Table\\".ucfirst($model).'Table';
          return new $table($this->getDb());
     }

}

?>