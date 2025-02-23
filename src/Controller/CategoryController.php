<?php

namespace App\Controller;

use App\Entity\Category;
use Services\Session;

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
               'token' => Session::get('token'),
          ]);
     }

     public function create()
     {
          $token = Session::get('token');
          return $this->render('categories/create.html.php', compact('token'));
     }

     public function store(array $data = [])
     {
          try {
               $this->checkToken($data['token']);
               $store = $this->getEntity(Category::class)->create($data);
               if ($store) {
                    Session::set('success', 'Nouvelle catégorie ajoutée');
                    return $this->redirect('categories.index');
               }
               throw new \Exception("Erreur lors de la sauvegarde des données");
          }
          catch(\Exception $e) {
               Session::set('danger', $e->getMessage());
               return $this->redirect('categories.create');
          }
     }

     public function edit(int $id)
     {
          $category = $this->getEntity(Category::class)->find($id);
          return $this->render('categories/edit.html.php', [
               'category' => $category,
               'token' => Session::get('token'),
          ]);
     }

     public function update(int $id, array $data = [])
     {
          try {
               $this->checkToken($data['token']);
               $update = $this->getEntity(Category::class)->update($id, $data);
               if ($update) {
                    Session::set('success', 'Catégorie N°'.$id. ' mise à jour');
                    return $this->redirect('categories.index');
               }
               throw new \Exception("Erreur lors de la sauvegarde des données");
          }
          catch(\Exception $e) {
               Session::set('danger', $e->getMessage());
               return $this->redirect('categories.edit', ['id' => $id]);
          }
     }

     public function delete(int $id, array $data = [])
     {
          $this->checkToken($data['token']);
          $this->getEntity(Category::class)->delete($id);
          return $this->redirect('categories.index');
     }

}