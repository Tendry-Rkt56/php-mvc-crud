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
          <h2>Les <span style="border-bottom:2px solid blueViolet;letter-spacing:3px">cat</span>égories</h2>
          <a href="/category/create" class="btn btn-secondary btn-sm">Ajouter une nouvelle catégorie</a>
     </div>

     <table class="container table table-striped">
          <thead>
               <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th style="width:300Px"></th>
               </tr>
          </thead>
          <tbody>
               <?php foreach($categories as $category): ?>
                    <tr>
                         <td><?=$category->id?></td>
                         <td><?=$category->nom?></td>
                         <td>
                              <div class="d-flex">
                                   <a href="/category/edit/<?=$category->id?>" class="mx-1 btn btn-primary">Modifier</a>
                                   <form action="/category" method="POST">
                                        <input type="hidden" value="<?=$category->id?>" name="id">
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
               <a class="btn <?=$class?>" href="/category?page=<?=$i?>"><?=$i?></a>
          <?php endfor ?>
     </div>

</div>
