<?php

namespace App\Validator;

use App\App;
use App\Manager;

class Validator
{

     private static $_instance;

     private function __construct()
     {
          
     }

     /**
      * @return self
      */
     public static function get()
     {
          if (self::$_instance == null) self::$_instance = new self();
          return self::$_instance;
     }

     /**
      * @param string $field Nom du champ
      * @param string $value Valeur du champ
      */
     public static function required(string $field, string $value): string
     {
          if (!isset($value) || empty($value)) throw new \Exception("Le champ $field est requis");
          return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
     }

     public static function email(string $field, string $email)
     {
          $email = self::required($field, $email);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new \Exception("L'email n'est pas valide");
          return $email;
     }

     public static function unique(string $table, string $colonne, string $field, string $value, ?int $id = null): string
     {
          $value = self::email($field, $value);
          $sql = "SELECT count(*) FROM $table WHERE $colonne = :value";
          if ($id != null) {
               $sql .= " AND id != :id";
          }
          $query = Manager::getInstance()->getDb()->getConn()->prepare($sql);
          $query->bindValue(':value', $value, \PDO::PARAM_STR);
          if (!is_null($id)) {
               $query->bindValue(':id', $id, \PDO::PARAM_INT);
          }
          $query->execute();
          if ($query->fetchColumn() == 0) return $value;
          throw new \Exception("$value existe déjà");
     }


}