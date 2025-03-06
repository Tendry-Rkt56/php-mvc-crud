<?php

use App\Container;
use App\Controller\ArticleController;
use Config\Routing;

$router = Routing::getInstance();
$container = new Container();

$router->map('GET', '/articles', function () use ($container) {
     $container->getController(ArticleController::class)->index($_GET);
}, 'articles.index');

$router->map('POST', '/articles/[i:id]', fn ($id) => $container->getController(ArticleController::class)->delete($id), 'articles.delete');

$match =  $router->match();
if ($match !== null) {

     if (is_callable($match['target'])) {
          call_user_func_array($match['target'], $match['params']);
     }
 
}