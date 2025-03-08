<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Articles ~ création</title>
     <?php

use Services\Session;

 require_once 'components/head.html' ?>
</head>
<body>
     
     <?php require_once 'components/header.html.php' ?>

     <div class="forms">
          <form method="POST" enctype="multipart/form-data" style="padding:20px;border-radius:4px;box-shadow:0 0 5px rgba(0,0,0,.2);height:300px;" class="gap-3 d-flex align-items-start justify-content-center flex-column vtsack">
               <h2>Création d'article</h2>
               <div class="container">
                    <?php foreach($_SESSION as $type => $message): ?>
                         <?php if ($type == 'danger' || $type == "success"): ?>
                              <div class="container alert alert-<?=$type?> text-center"><?=$message?></div>
                              <?php Session::delete($type) ?>
                         <?php endif ?>
                    <?php endforeach ?>
               </div>
               <div class="container row">
                    <div class="col-sm-6">
                         <input type="text" placeholder="Nom de l'article..." class="form-control" name="nom">
                    </div>
                    <div class="col-sm-6">
                         <input type="number" placeholder="Prix de l'article..." class="form-control" name="prix">
                    </div>
               </div>
               <div class="container row">
                    <div class="col-sm-6">
                         <input type="file" placeholder="Image associée..." class="form-control" name="image">
                    </div>
                    <div class="col-sm-6">
                         <select name="category" id="" class="form-select">
                              <option value="">Séléctionner la catégorie associée</option>
                              <?php foreach($categories as $category): ?>
                                   <option value="<?=$category->id?>"><?=$category->nom?></option>
                              <?php endforeach ?>
                         </select>
                    </div>
               </div>
               <input type="hidden" name="token" value="<?=$token?>">
               <input type="submit" class="align-self-center my-3 btn btn-primary" value="Ajouter">
          </form>
     </div>

</body>
</html>