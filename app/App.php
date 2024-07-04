<?php

namespace App;

use Config\DataBase;

class App 
{

     private static $_db;
     private static $_instance;

     /**
     *  Définition du singleton sur la classe App
     * @return self
     */
     public static function getApp (): self
     {
          if (self::$_instance == null) {
               self::$_instance = new self();
          }
          return self::$_instance;
     }

     /**
     * Définition du singleton sur la classe DataBase
     * @return DataBase 
     */
     private function getDb (): DataBase
     {
          if (self::$_db == null) {
               self::$_db = new DataBase(DB_NAME);
          }
          return self::$_db;
     }

     /**
     * Création du factory qui permet de récupérer des instances de model plus facilement
     */
     public function getTable (string $model)
     {
          $table = "\\App\\Models\\Table\\".ucfirst($model).'Table';
          return new $table($this->getDb());
     }

}

?>