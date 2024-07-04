<?php

namespace App\Controller;

class HomeController extends Controller
{

     public function home (array $data = [])
     {
          $articles = $this->container->getTable('article')->count();
          $categories = $this->container->getTable('category')->count();
          return $this->render('home.index', [
               'articles' => $articles,
               'categories' => $categories,
          ]);
     }

}

?>