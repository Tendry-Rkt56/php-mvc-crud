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

     <?php require_once 'components/header.html' ?>
     <div class="containers">
          <div class="container">
               <div class="d-flex align-items-start justify-content-start flex-column gap-2 flex-column">
                    <div class="container d-flex align-items-center justify-content-between flex-row">
                         <h2>Les articles</h2>
                         <a href="" class="btn btn-primary btn-sm">Ajouter</a>
                    </div>
                    <form action=""  class="container d-flex align-items-center justify-content-start flex-row gap-2">
                         <input style="width:15%" type="text" class="form-control" placeholder="Rechercher..." name="search">
                         <input type="submit" class="btn btn-primary btn-sm" value="Rechercher">
                    </form>   
                    <div class="container">
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
                                   <th>#</th>
                                   <th>Nom</th>
                                   <th>Prix</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($articles as $article): ?>
                                   <tr>
                                        <td><?=$article->id?></td>
                                        <td><?=$article->nom?></td>
                                        <td><?=number_format($article->prix, 2, '.', ' ')?> Ar</td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="" class="btn btn-success btn-sm">Editer</a>
                                                  <form action="/articles/<?=$article->id?>" method="POST">
                                                       <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     
</body>
</html>