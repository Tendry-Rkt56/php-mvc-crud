<div class='container'>

     <?php if (isset($_SESSION)): ?>
          <?php foreach($_SESSION as $key => $value): ?>
               <?php if ($key !== 'user' && $key !== 'tokens' && $key !== 'panier'):?>
                    <p class="d-flex align-items-center justify-content-center container alert alert-<?=$key?>"><?=$value?></p>
                    <?php unset($_SESSION[$key])?>
               <?php endif?>
          <?php endforeach?>
     <?php endif ?>

     <div class="container d-flex align-items-center justify-content-between gap-1 my-4">
          <h2>Les <span style="border-bottom:2px solid blueViolet;">ar</span>ticles</h2>
          <a href="/articles/create" class="btn btn-secondary btn-sm">Ajouter un nouvel article</a>
     </div>

     <table class="container table table-striped">
          <thead>
               <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prix</th>
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
     
     <div class="my-5 d-flex align-items-center justify-content-center flex-row gap-2">
          <?php for($i = 1; $i <= $maxPages; $i++): ?>
               <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
               <a class="btn <?=$class?>" href="/articles?page=<?=$i?>"><?=$i?></a>
          <?php endfor ?>
     </div>

</div>
