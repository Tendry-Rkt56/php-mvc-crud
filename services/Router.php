<?php

use App\Controller\ArticleController;
use Config\AltoRouter;

$router = AltoRouter::getInstance();

$router->map('GET', '/articles', function() {
     $controller = new ArticleController();
     return $controller->index();
});

$match =  $router->match();
if ($match !== null) {

     if (is_callable($match['target'])) {
          call_user_func_array($match['target'], $match['params']);
     }
 
}