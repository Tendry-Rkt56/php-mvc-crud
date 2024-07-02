<?php

require_once '../vendor/autoload.php'; 
require_once '../Config/Uri.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/index.css">
</head>
<body>
     <?php require_once 'components/header.php' ?>
     <div class="containers">
          <?php require_once '../Config/Router.php' ?>
     </div>
     
</body>
</html>