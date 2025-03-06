<?php

use App\Controller\ArticleController;
use Config\Routing;

$router = Routing::getInstance();

$router->map('GET', '/articles', function () use ($router) {
     $controller = new ArticleController($router);
     return $controller->index($_GET);
}, 'articles.index');

$router->map('POST', '/articles/[i:id]', function ($id) use ($router) {
     $controller = new ArticleController($router);
     return $controller->delete($id);
}, 'articles.delete');

$match =  $router->match();
if ($match !== null) {

     if (is_callable($match['target'])) {
          call_user_func_array($match['target'], $match['params']);
     }
 
}