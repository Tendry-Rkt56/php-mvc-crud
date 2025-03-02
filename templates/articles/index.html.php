<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les articles</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>

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
                                        <td><?=$article->prix?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="" class="btn btn-success btn-sm">Editer</a>
                                                  <form action="">
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