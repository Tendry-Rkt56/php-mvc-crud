<?php 
use Services\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les catégories</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>

     <?php require_once 'components/header.html.php' ?>
     <div class="containers">
          <div class="container">
               <div class="d-flex align-items-start justify-content-start flex-column gap-2 flex-column">
                    <div class="container d-flex align-items-center justify-content-between flex-row">
                         <h2>Les catégories</h2>
                         <a href="/categories/new" class="btn btn-secondary">Ajouter</a>
                    </div>
                    <form action="" class="container d-flex align-items-center justify-content-start flex-row gap-2">
                         <input value="<?=$data['search'] ?? ''?>" style="width:15%" type="text" class="form-control" placeholder="Rechercher..." name="search">
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
                                   <th>#</th>
                                   <th>Nom</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($categories as $category): ?>
                                   <tr>
                                        <td><?=$category->id?></td>
                                        <td><?=$category->nom?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="/categories/edit-<?=$category->id?>" class="btn btn-success btn-sm">Editer</a>
                                                  <form action="/categories/<?=$category->id?>" method="POST">
                                                       <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
                    <div style="width:60%" class="my-5 d-flex justify-content-between flex-row gap-1 align-items-center">
                         <div class="justify-self-baseline fw-bolder"><?=$categoriesLength?> / <?=$count?></div>
                         <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
                              <?php for($i = 1; $i <= $maxPages; $i++): ?>
                                   <?php 
                                        $query = isset($data['search']) ? 'search='.$data['search'] : '';
                                   ?>
                              <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                                   <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/categories?page=<?=$i?><?="&".$query?>"><?=$i?></a>
                              <?php endfor ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     
</body>
</html>