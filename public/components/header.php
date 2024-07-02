<?php
     if (session_status() == PHP_SESSION_NONE) session_start();
     $uri = $_SERVER['REQUEST_URI'];
?>
<header>
     <div class="logo">
          <h3><span>CR</span>UD</h3>
     </div>
     <nav>
          <ul>
               <li><a <?php if (str_contains($uri, '/articles')): ?> style="color:blue" <?php endif ?>href="/articles">Les articles</a></li>
               <li><a <?php if (str_contains($uri, '/category')):?>  style="color:blue"<?php endif ?>href="/category">Les catégories</a></li>
          </ul>
     </nav>
</header>