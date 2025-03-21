<?php
     use Services\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Catégorie ~ <?=$category->nom?></title>
     <?php require_once 'components/head.html' ?>
</head>
<body>
     
     <?php require_once 'components/header.html.php' ?>

     <div class="forms">
          <form method="POST" style="padding:20px;border-radius:4px;box-shadow:0 0 5px rgba(0,0,0,.2);height:300px;" class="gap-3 d-flex align-items-center justify-content-center flex-column vtsack">
               <h2>Edition</h2>
               <div class="container">
                    <?php foreach($_SESSION as $type => $message): ?>
                         <?php if ($type == 'danger' || $type == "success"): ?>
                              <div class="container alert alert-<?=$type?> text-center"><?=$message?></div>
                              <?php Session::delete($type) ?>
                         <?php endif ?>
                    <?php endforeach ?>
               </div>
               <div class="d-flex align-items-center justify-content-center flex-row gap-2 flex-wrap">
                    <input value="<?=$category->nom?>" required type="text" placeholder="Nom de la catégorie..." class="form-control" name="nom">
                    <input type="submit" class="align-self-center my-3 btn btn-primary" value="Ajouter">
               </div>
               <input type="hidden" name="token" value="<?=$token?>">
          </form>
     </div>

</body>
</html>