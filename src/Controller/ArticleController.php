<?php

namespace App\Controller;

use App\Entity\Article;

class ArticleController extends Controller
{

     public function index() 
     {

          $articles = $this->getEntity(Article::class)->findAll();
          return $this->render('articles/index.html.php', [
               'articles' => $articles,
          ]);

     }

     public function delete(int $id)
     {
          $delete = $this->getEntity(Article::class)->delete($id);
          return $this->redirect('articles.index');
     }

}