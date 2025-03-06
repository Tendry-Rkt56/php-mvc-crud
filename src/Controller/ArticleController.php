<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Config\Routing;

class ArticleController extends Controller
{

     public function index(array $data = []) 
     {

          $count = $this->getEntity(Article::class)->count($data);
          $page = isset($data['page']) && !empty($data['page']) ? $data['page'] : 1;
          $limit = isset($data['limit']) && !empty($data['limit']) ? $data['limit'] : 10;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;  
          $articles = $this->getEntity(Article::class)->getAll($limit, $offset, $data);
          $studentsLength = count($articles);
          $categories = $this->getEntity(Category::class)->findAll();
          return $this->render('articles/index.html.php', [
               'articles' => $articles,
               'categories' => $categories,
               'data' => $data,
               'page' => $page,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'articlesLength' => $studentsLength,
               'count' => $count,
          ]);

     }

     public function create() 
     {
          $categories = $this->getEntity(Category::class)->findAll(); 
          return $this->render('articles/create.html.php', [
               'categories' => $categories,
          ]);
     }

     public function store(array $data = [])
     {
          $store = $this->getEntity(Article::class)->create($data);
          return $this->redirect('articles.index');
     }

     public function delete(int $id)
     {
          $delete = $this->getEntity(Article::class)->delete($id);
          return $this->redirect('articles.index');
     }

}