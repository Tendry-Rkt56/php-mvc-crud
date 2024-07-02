<form enctype="multipart/form-data" class="forms-create container-md d-flex align-items-center justify-content-center flex-column" action="" method="POST">
     <h3 class="mb-4" ><?=$article->nomArticle?></h3>
     <?php if (isset($article->image)): ?>
          <img style="border-radius:50%;" src="/<?=$article->image ?? ''?>" class="mb-4" width="60px" height="60px" alt="">
     <?php endif ?>
     <div class="d-flex align-items-center justify-content-center container-fluid">
          <label style="width:30%" for="" class="fw-bolder">Nom: </label>
          <input style="width:70%" type="text" class="form-control" placeholder="Nom..." name="nom" value="<?=$article->nomArticle?>">
     </div>
     <div class="d-flex align-items-center justify-content-center container-fluid my-2">
          <label style="width:30%" for="" class="fw-bolder">Prix: </label>
          <input style="width:70%" type="number" class="form-control" placeholder="Prix..." name="prix" value="<?=$article->prix?>">
     </div>
     <div class="d-flex align-items-center justify-content-center container-fluid my-2">
          <label style="width:30%" for="" class="fw-bolder">Prix: </label>
          <select style="width:70%" name="category" id="" class="form-select">
               <option value="" disabled>Séléctionner la catégorie associée</option>
               <?php foreach($categories as $category): ?>
                    <option <?php if ($category->id == $article->categoryId): ?>selected<?php endif ?> value="<?=$category->id?>"><?=$category->nom?></option>
               <?php endforeach?>
          </select>
     </div>
     <div class="d-flex align-items-center justify-content-center container-fluid my-2">
          <label style="width:30%" for="" class="fw-bolder">Image: </label>
          <input style="width:70%" type="file" class="form-control" name="image">
     </div>
     <div class="d-flex align-items-center justify-content-center container-fluid my-2">
          <input style="width:70%" type="hidden" name="token" value="<?=$token?>">
     </div>
     <input type="submit" class="btn btn-primary mt-5" value="Modifier">
</form>

