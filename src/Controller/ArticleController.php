<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;

class ArticleController extends Controller
{

     public function index() 
     {

          $articles = $this->getEntity(Article::class)->findAll();
          $categories = $this->getEntity(Category::class)->findAll();
          return $this->render('articles/index.html.php', [
               'articles' => $articles,
               'categories' => $categories,
          ]);

     }

     public function delete(int $id)
     {
          $delete = $this->getEntity(Article::class)->delete($id);
          return $this->redirect('articles.index');
     }

}