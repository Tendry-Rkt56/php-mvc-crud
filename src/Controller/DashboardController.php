<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;

class DashboardController extends Controller
{

     public function index()
     {
          $articles = $this->getEntity(Article::class)->count();
          $categories = $this->getEntity(Category::class)->count();
          return $this->render('dashboard/index.html.php', [
               'articles' => $articles,
               'categories' => $categories,
          ]);
     }

}