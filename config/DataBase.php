<?php

namespace Config;

require_once 'Constante.php';

class DataBase 
{

     private string $dbName;
     private $conn;

     public function __construct (string $dbName)
     {
          $this->dbName = $dbName;
          $this->conn = new \PDO("mysql:host=".DB_HOST.";dbname=".$this->dbName.";charset=".DB_CHARSET, DB_USER, DB_PASS);
     }

     public function getConn (): \PDO
     {
          return $this->conn;
     }

}