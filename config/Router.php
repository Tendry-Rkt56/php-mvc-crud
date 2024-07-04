<?php

use App\Container;
use App\Controller\ArticleController;
use App\Controller\CategoryController;
use App\Controller\ErrorController;
use App\Controller\HomeController;

require_once '../vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();

$container = new Container();

$router->map('GET', '/', fn () => $container->getController(HomeController::class)->home());

// Routes pour les articles

$router->map('GET', '/articles', fn () => $container->getController(ArticleController::class)->index($_GET));

$router->map('POST', '/articles/create', fn () => $container->getController(ArticleController::class)->store($_POST, $_FILES));

$router->map('GET', '/articles/create', fn () => $container->getController(ArticleController::class)->create());

$router->map('POST', '/articles/create', fn () => $container->getController(ArticleController::class)->store($_POST));

$router->map('GET', '/articles/edit/[i:id]', fn ($id) => $container->getController(ArticleController::class)->edit($id));

$router->map('POST', '/articles/edit/[i:id]', fn ($id) => $container->getController(ArticleController::class)->update($id, $_POST, $_FILES));

$router->map('POST', '/articles', fn () => $container->getController(ArticleController::class)->delete($_POST));

//------------------------------------------------------------------

// Routes pour les catégories

$router->map('GET', '/category', fn () => $container->getController(CategoryController::class)->index($_GET));

$router->map('POST', '/category/create', fn () => $container->getController(CategoryController::class)->store($_POST));

$router->map('GET', '/category/create', fn () => $container->getController(CategoryController::class)->create());

$router->map('POST', '/category/create', fn () => $container->getController(CategoryController::class)->store($_POST));

$router->map('GET', '/category/edit/[i:id]', fn ($id) => $container->getController(CategoryController::class)->edit($id));

$router->map('POST', '/category/edit/[i:id]', fn ($id) => $container->getController(CategoryController::class)->update($id, $_POST, $_FILES));

$router->map('POST', '/category', fn () => $container->getController(CategoryController::class)->delete($_POST));

//------------------------------------------------------------------

$router->map('GET', '/error', function () use ($container) {
     $container->getController(ErrorController::class)->accessDenied();
});

$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}
?>