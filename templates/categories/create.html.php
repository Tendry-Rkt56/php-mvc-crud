<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Catégorie ~ création</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>
     
     <?php require_once 'components/header.html' ?>

     <div class="forms">
          <form method="POST" style="padding:20px;border-radius:4px;box-shadow:0 0 5px rgba(0,0,0,.2);height:300px;" class="gap-3 d-flex align-items-center justify-content-center flex-column vtsack">
               <h2>Nouvelle catégorie</h2>
               <div class="d-flex align-items-center justify-content-center flex-row gap-2 flex-wrap">
                    <input required type="text" placeholder="Nom de la catégorie..." class="form-control" name="nom">
                    <input type="submit" class="align-self-center my-3 btn btn-primary" value="Ajouter">
               </div>
          </form>
     </div>

</body>
</html>