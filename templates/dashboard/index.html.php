<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>
     <?php require_once 'components/header.html.php' ?>
     <div class="dashboard">
          <a href="/articles" class="item articles">
               <p><?=$articles?></p>
               <h2>Gérer les articles</h2>
          </a>
          <a href="/categories" class="item categories">
               <p><?=$categories?></p>
               <h2>Les catégories</h2>
          </a>
     </div>
</body>
</html>