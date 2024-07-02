<?php

namespace App\Controller;

class CategoryController extends Controller 
{
     
     public function index (array $data = [])
     {
          $count = $this->container->getTable('category')->count();
          $page = isset($data['page']) ? $data['page'] : 1;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          $maxPages = ceil($count / $limit);
          $categories = $this->container->getTable('category')->all($limit, $offset);
          return $this->render('category.index', [
               'token' => $_SESSION['token'],
               'categories' => $categories,
               'page' => $page,
               'maxPages' => $maxPages,
          ]);
     }

     public function create ()
     {
          return $this->render('category.create', [
               'token' => $_SESSION['token']
          ]);
     }

     public function store (array $data = [])
     {
          if ($data['token'] != $_SESSION['token']) {
               header('Location: /error');
               exit();
          }
          else {
               $stored = $this->container->getTable('category')->create($data);
               if ($stored) {
                    header('Location: /category');
                    exit();
               }
               else {
                    header('Location: /category/create');
                    exit();
               }
          }
     }

     public function edit (int $id) 
     {
          $category = $this->container->getTable('category')->find($id);
          return $this->render('category.edit', [
               'category' => $category,
               'token' => $_SESSION['token'],
          ]);
     }

     public function update (int $id, array $data = [])
     {
          if ($_SESSION['token'] != $data['token']) {
               header('Location: /error');
               exit();
          }
          else {
               $update = $this->container->getTable('category')->update($id, $data);
               if ($update) {
                    header('Location: /category');
                    exit();
               }
               else {
                    header('Location: /category/edit/'.$id);
                    exit();
               }
          }
     }

     public function delete (array $data = [])
     {
          $delete = $this->container->getTable('category')->delete($data['id'], $data);
          if ($delete) {
               header('Location: /category');
               exit();
          }
     }
}