<?php

namespace App\Models\Table;

class ArticleTable extends Table
{

     public function count ()
     {
          $query = $this->db->getConn()->query("SELECT count(*) FROM articles WHERE id > 0");
          return $query->fetchColumn();
     }

     private function checkImage (array $image = [], int $id = null): mixed
     {
          $article = $this->getArticle($id);
          try {
               $repertoire = 'image/articles/';
               $imageFile = $repertoire . $image['name'];
               $extensions = ['jpeg', 'jpg', 'png'];
               $extension = pathinfo($image['name'], PATHINFO_EXTENSION); 
               if ($article->image == null && empty($image['tmp_name'])) return null;
               if ($article->image !== null && empty($image['tmp_name'])) return $article->image;
               else {
                    if (file_exists($article->image)) {
                         unlink($article->image);
                    }
                    if (in_array($extension, $extensions)) {
                         if (move_uploaded_file($image['tmp_name'], $imageFile)) {
                              return $imageFile;
                         }
                         else {
                              throw new \Exception('Erreur lors du téléchargement');
                         }
                    }
                    else {
                         throw new \Exception('Image pas pris en compte');
                    }
                    $response = true;
               }
     
          }
          catch(\Exception $e) {
               $response = null;
          }
          return $response;
     }

     /**
     * Insère un nouvel article dans la base de donnée
     * @param array $data
     * @return bool
     */
     public function create (array $data = [], array $files = []): bool
     {
          $query = "INSERT INTO articles (nom, prix, image) VALUES (:nom, :prix, :image)";
          $result = $this->db->getConn()->prepare($query);
          extract($data);
          $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $result->bindValue(':prix', $prix, \PDO::PARAM_INT);
          $result->bindValue(':image', $this->checkImage($files['image']), \PDO::PARAM_STR);
          // $result->bindValue(':category', $category, \PDO::PARAM_STR);
          return $result->execute();
     }

     /**
     * Recupère tous les articles dans la base de donnée
     * @return mixed   
     */
     public function all (int $limit, int $offset): mixed
     {
          $query = $this->db->getConn()->query("SELECT * FROM articles WHERE id > 0 LIMIT $limit OFFSET $offset");
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     /**
     * Supprime un article en fonction de l'id de l'article
     * @param int $id
     * @return bool 
     */
     public function delete (int $id): bool
     {
          $article = $this->getArticle($id);
          $path = $article->image;
          if (file_exists($path)) {
               unlink($path);
          }
          //--------------
          $query = "DELETE FROM articles WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = 'Article supprimé';
          return $result->execute();
     }

     /**
     * Mise à jour d'un article en fonction de son id
     * @param int $id
     * @param array $data
     * @return bool
     */
     public function update (int $id, array $data = [], array $files = []): bool
     {
          $query = "UPDATE articles SET nom = :nom, prix = :prix, image = :image WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          extract($data);
          $result->bindValue(":nom", $nom, \PDO::PARAM_STR);
          $result->bindValue(":prix", $prix, \PDO::PARAM_INT);
          $result->bindValue(":image", $this->checkImage($files['image'], $id), \PDO::PARAM_STR);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          // $result->bindValue(":category", $category, \PDO::PARAM_INT);
          $_SESSION['success'] = 'Article mis à jour';
          return $result->execute();
     }

     /**
     * Recupère un article en particulier dans la base de donnée
     * @param int $id
     * @return mixed
     */
     public function getArticle (?int $id = null): mixed
     {
          $query = "SELECT * FROM articles WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(':id', $id, \PDO::PARAM_STR);
          $result->execute();
          return $result->fetch(\PDO::FETCH_OBJ) ?? null;
     }

}

?>