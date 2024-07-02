<?php

namespace App\Controller;

class ArticleController extends Controller
{

     public function index (array $data = [])
     {
          $count = $this->container->getTable('article')->count();
          $page = isset($data['page']) ? $data['page'] : 1;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          $maxPages = ceil($count / $limit);
          $articles = $this->container->getTable('article')->all($limit, $offset);
          return $this->render('articles.index', [
               'token' => $_SESSION['token'],
               'articles' => $articles,
               'page' => $page,
               'maxPages' => $maxPages,
          ]);
     }
     
     public function create ()
     {
          $categories = $this->container->getTable('category')->getAll();
          return $this->render('articles.create', [
               'categories' => $categories,
               'token' => $_SESSION['token']
          ]);
     }

     public function store (array $data = [], array $files = [])
     {
          if ($data['token'] != $_SESSION['token']) {
               header('Location: /error');
               exit();
          }
          else {
               $stored = $this->container->getTable('article')->create($data, $files);
               if ($stored) {
                    header('Location: /articles');
                    exit();
               }
               else {
                    header('Location: /articles/create');
                    exit();
               }
          }
     }

     public function edit (int $id) 
     {
          $article = $this->container->getTable('article')->getArticle($id);
          $categories = $this->container->getTable('category')->getAll();
          return $this->render('articles.edit', [
               'article' => $article,
               'categories' => $categories,
               'token' => $_SESSION['token'],
          ]);
     }

     public function update (int $id, array $data = [], array $files = [])
     {
          if ($_SESSION['token'] != $data['token']) {
               header('Location: /error');
               exit();
          }
          else {
               $update = $this->container->getTable('article')->update($id, $data, $files);
               if ($update) {
                    header('Location: /articles');
                    exit();
               }
               else {
                    header('Location: /articles/edit/'.$id);
                    exit();
               }
          }
     }

     public function delete (array $data = [])
     {
          $delete = $this->container->getTable('article')->delete($data['id'], $data);
          if ($delete) {
               header('Location: /articles');
               exit();
          }
     }

}