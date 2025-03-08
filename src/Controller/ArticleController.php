<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Services\Session;

class ArticleController extends Controller
{

     public function index(array $data = []) 
     {

          $count = $this->getEntity(Article::class)->count();
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
               'token' => Session::get('token')
          ]);

     }

     public function create() 
     {
          $categories = $this->getEntity(Category::class)->findAll(); 
          return $this->render('articles/create.html.php', [
               'categories' => $categories,
               'token' => Session::get('token'),
          ]);
     }

     public function store(array $data = [], array $files = [])
     {
          try {
               $this->checkToken($data);
               $store = $this->getEntity(Article::class)->create($data, $files);
               if ($store) {
                    Session::set('success', 'Nouvelle article crée');
                    return $this->redirect('articles.index');
               }
               throw new \Exception('Erreur lors de la sauvegarde des données');
          }
          catch(\Exception $e) {
               Session::set('danger', $e->getMessage());
               return $this->redirect('articles.create');
          }
     }

     public function edit(int $id)
     {
          $article = $this->getEntity(Article::class)->find($id);
          $categories = $this->getEntity(Category::class)->findAll(); 
          return $this->render('articles/edit.html.php', [
               'article' => $article,
               'token' => Session::get('token'),
               'categories' => $categories,
          ]);
     }

     public function update(int $id, array $data = [], array $files = [])
     {
          try {
               $this->checkToken($data);
               $update = $this->getEntity(Article::class)->update($id, $data, $files);
               if ($update) {
                    Session::set('success', 'Article N°'.$id. ' mise à jour');
                    return $this->redirect('articles.index');
               }
               throw new \Exception('Erreur lors de la sauvegarde des données');
          }
          catch(\Exception $e) {
               Session::set('danger', $e->getMessage());
               return $this->redirect('articles.edit', ['id' => $id]);
          }
     }

     public function delete(int $id, array $data = [])
     {
          $this->checkToken($data);
          $delete = $this->getEntity(Article::class)->delete($id, true);
          return $this->redirect('articles.index');
     }

}