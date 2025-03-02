<?php

namespace App\Entity;

class Article extends Entity
{

     protected string $table = 'articles';

     public function create(array $data = []) 
     {
          $sql = "INSERT INTO articles(nom, prix, image, category_id) VALUES (:nom, :prix, :image, :category)";
          $query = $this->getDb()->prepare($sql);
          $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $query->bindValue(':prix', $data['nom'], \PDO::PARAM_INT);
          $query->bindValue(':image', $data['nom'], \PDO::PARAM_STR);
     }


}