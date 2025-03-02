<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les articles</title>
</head>
<body>

     <?php foreach($articles as $article): ?>
          <div class="container">
               <h3><?=$article->nom?></h3>
          </div>
     <?php endforeach ?>

</body>
</html>