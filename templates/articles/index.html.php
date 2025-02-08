<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les articles</title>
     <?php

use Services\Session;

 require_once 'components/head.html' ?>
</head>
<body>

     <?php require_once 'components/header.html.php' ?>
     <div class="containers">
          <div class="container">
               <div class="d-flex align-items-start justify-content-start flex-column gap-2 flex-column">
                    <div class="container d-flex align-items-center justify-content-between flex-row">
                         <h2>Les articles</h2>
                         <a href="/articles/create" class="btn btn-secondary">Ajouter</a>
                    </div>
                    <form action="" class="container d-flex align-items-center justify-content-start flex-row gap-2">
                         <input value="<?=$data['search'] ?? ''?>" style="width:15%" type="text" class="form-control" placeholder="Rechercher..." name="search">
                         <select name="category" id="" class="form-select" style="width:15%;">
                              <option value="">Séléctionner une catégorie</option>
                              <?php foreach($categories as $category): ?>
                                   <option <?php if (isset ($data['category']) && $category->id == $data['category']): ?> selected <?php endif ?> value="<?=$category->id?>"><?=$category->nom?></option>
                              <?php endforeach ?>
                         </select>
                         <input type="submit" class="btn btn-primary btn-sm" value="Rechercher">
                    </form>   
                    <div class="mt-3 container">
                         <?php foreach($_SESSION as $type => $message): ?>
                              <?php if ($type == 'danger' || $type == 'success'): ?>
                                   <div class="text-center alert alert-<?=$type?>"><?=$message?></div>
                                   <?php Session::delete($type) ?>
                              <?php endif ?>
                         <?php endforeach ?>
                    </div>
                    <table class="table table-striped">
                         <thead>
                              <tr>
                                   <th></th>
                                   <th>Nom</th>
                                   <th>Prix</th>
                                   <th>Catégorie associée</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($articles as $article): ?>
                                   <tr>
                                        <td>
                                             <?php if (isset($article->image) && !empty($article->image)): ?>
                                                  <img src="<?=$article->image?>" style="width:40px;height:40px;border-radius:50%" alt="">
                                             <?php endif ?>
                                        </td>
                                        <td><?=$article->nom?></td>
                                        <td class="fw-bolder"><?=number_format($article->prix, 2, '.', ' ')?> Ar</td>
                                        <td><?=$article->name?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="/articles/edit-<?=$article->id?>" class="btn btn-success btn-sm">Editer</a>
                                                  <form action="/articles/<?=$article->id?>" method="POST">
                                                       <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
                    <div style="width:60%" class="my-5 d-flex justify-content-between flex-row gap-1 align-items-center">
                         <div class="justify-self-baseline fw-bolder"><?=$articlesLength?> / <?=$count?></div>
                         <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
                              <?php for($i = 1; $i <= $maxPages; $i++): ?>
                                   <?php 
                                        $query = isset($data['search']) ? 'search='.$data['search'] : '';
                                        $query .= isset($data['category']) ? '&category='.$data['category'] : '';     
                                        $query .= isset($data['limit']) ? '&limit='.$data['limit'] : '';     
                                   ?>
                              <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                                   <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/articles?page=<?=$i?><?="&".$query?>"><?=$i?></a>
                              <?php endfor ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     
</body>
</html>