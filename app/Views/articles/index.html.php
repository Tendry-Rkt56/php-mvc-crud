<div class='container'>

     <?php if (isset($_SESSION)): ?>
          <?php foreach($_SESSION as $key => $value): ?>
               <?php if ($key !== 'user' && $key !== 'token' && $key !== 'panier'):?>
                    <p class="d-flex align-items-center justify-content-center container alert alert-<?=$key?>"><?=$value?></p>
                    <?php unset($_SESSION[$key])?>
               <?php endif?>
          <?php endforeach?>
     <?php endif ?>

     <div class="container d-flex align-items-center justify-content-between gap-1 my-4">
          <h2>Les <span style="border-bottom:2px solid blueViolet;">ar</span>ticles</h2>
          <form action="" class="gap-2 d-flex align-items-center justify-content-center flex-row">
               <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="<?=$data['search'] ?? ''?>">
               <select name="category" class="form-select" id="">
                    <option <?php if (isset($data['category']) && $data['category'] == 1000): ?> selected <?php endif ?> value="1000">Tous</option>
                    <?php foreach($categories as $category): ?>
                         <option <?php if (isset($data['category']) && $data['category'] == $category->id): ?> selected <?php endif ?> value="<?=$category->id?>"><?=$category->nom?></option>
                    <?php endforeach ?>
               </select>
               <input type="submit" class="btn btn-sm btn-primary">
          </form>
          <a href="/articles/create" class="btn btn-secondary btn-sm">Ajouter un nouvel article</a>
     </div>

     <table class="container table table-striped">
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
                              <img style="border-radius:50%;" src="/<?=$article->image ?? ''?>" width="40px" height="40px" alt="">
                         </td>
                         <td><?=$article->nom?></td>
                         <td><?=number_format($article->prix, thousands_separator: ' ')?></td>
                         <td><?=$article->category ?? 'Pas de catégorie associée'?></td>
                         <td>
                              <div class="d-flex">
                                   <a href="/articles/edit/<?=$article->id?>" class="mx-1 btn btn-primary">Modifier</a>
                                   <form action="/articles" method="POST">
                                        <input type="hidden" value="<?=$article->id?>" name="id">
                                        <input type="hidden" value="<?=$token?>" name="token">
                                        <input type="submit" class="btn btn-danger" value="Supprimer">
                                   </form>
                              </div>
                         </td>
                    </tr>  
               <?php endforeach ?>   
          </tbody>
     </table>
     
     <div class="my-5 d-flex align-items-center justify-content-center flex-row gap-1">
          <?php for($i = 1; $i <= $maxPages; $i++): ?>
               <?php 
                    $query = isset($data['search']) ? 'search='.$data['search'] : '';
                    $query .= isset($data['category']) ? '&category='.$data['category'] : '';     
               ?>
               <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
               <a class="btn <?=$class?>" href="/articles?page=<?=$i?><?="&".$query?>"><?=$i?></a>
          <?php endfor ?>
     </div>

</div>
