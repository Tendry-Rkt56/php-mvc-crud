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
          $categoriesLength = count($categories);
          return $this->render('categories/index.html.php', [
               'page' => $page,
               'maxPages' => $maxPages,
               'categories' => $categories,
               'count' => $count,
               'categoriesLength' => $categoriesLength,
               'data' => $data,
          ]);
     }

     public function create()
     {
          return $this->render('categories/create.html.php');
     }

     public function store(array $data = [])
     {
          $this->getEntity(Category::class)->create($data);
          return $this->redirect('categories.index');
     }

     public function delete(int $id)
     {
          $this->getEntity(Category::class)->delete($id);
          return $this->redirect('categories.index');
     }

}