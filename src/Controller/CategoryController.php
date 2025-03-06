<?php

namespace App\Controller;

use App\Entity\Category;

class CategoryController extends Controller
{

     public function index(array $data = [])
     {
          $count = $this->getEntity(Category::class)->count();
          $page = isset($data['page']) && !empty($data['page']) ? $data['page'] : 1;
          $limit = 10;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $categories = $this->getEntity(Category::class)->getAll($limit, $offset, $data);
          $categoriesLength    = count($categories);
          return $this->render('categories/index.html.php', [
               'page' => $page,
               'maxPages' => $maxPages,
               'categories' => $categories,
               'count' => $count,
               'categoriesLength' => $categoriesLength,
          ]);
     }

}