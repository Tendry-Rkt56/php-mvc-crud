<?php $uri = $_SERVER['REQUEST_URI'] ?>

<header>
     <div class="logo">
          <h2>Dashboard</h2>
     </div>
     <nav>
          <ul>
               <li><a <?php if ($uri == '/'): ?> class="active" <?php endif ?> href="">Accueil</a></li>
               <li><a <?php if (str_contains($uri, '/articles')): ?> class="active" <?php endif ?> href="/articles">Articles</a></li>
               <li><a <?php if (str_contains($uri, '/categories')): ?> class="active" <?php endif ?> href="/categories">Catégories</a></li>
          </ul>
     </nav>
</header>