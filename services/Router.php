<?php

use App\Container;
use App\Controller\ArticleController;
use App\Controller\CategoryController;
use Config\Routing;

$router = Routing::getInstance();
$container = new Container();

$router->map('GET', '/articles', fn () => $container->getController(ArticleController::class)->index($_GET), 'articles.index');
$router->map('GET', '/articles/create', fn () => $container->getController(ArticleController::class)->create(), 'articles.create');
$router->map('POST', '/articles/create', fn () => $container->getController(ArticleController::class)->store($_POST), 'articles.store');
$router->map('GET', '/articles/edit-[i:id]', fn ($id) => $container->getController(ArticleController::class)->edit($id), 'articles.edit');
$router->map('POST', '/articles/edit-[i:id]', fn ($id) => $container->getController(ArticleController::class)->update($id, $_POST), 'articles.update');
$router->map('POST', '/articles/[i:id]', fn ($id) => $container->getController(ArticleController::class)->delete($id), 'articles.delete');

$router->map('GET', '/categories', fn () => $container->getController(CategoryController::class)->index($_GET), 'categories.index');
$router->map('GET', '/categories/new', fn () => $container->getController(CategoryController::class)->create(), 'categories.create');
$router->map('POST', '/categories/new', fn () => $container->getController(CategoryController::class)->store($_POST), 'categories.store');
$router->map('GET', '/categories/edit-[i:id]', fn ($id) => $container->getController(CategoryController::class)->edit($id), 'categories.edit');
$router->map('POST', '/categories/[i:id]', fn ($id) => $container->getController(CategoryController::class)->delete($id), 'categories.delete');

$match =  $router->match();
if ($match !== null) {

     if (is_callable($match['target'])) {
          call_user_func_array($match['target'], $match['params']);
     }
 
}