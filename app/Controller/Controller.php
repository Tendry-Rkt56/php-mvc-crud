<?php

namespace App\Controller;

use AltoRouter;
use App\App;

class Controller 
{

     public function __construct (protected App $container, protected AltoRouter $router)
     {
          if (session_status() == PHP_SESSION_NONE) session_start();
          if (!isset($_SESSION['token'])) {
               $_SESSION['token'] = bin2hex(random_bytes(32)); 
          }
     }

     public function render (string $view, array $data = [])
     {
          extract($data);
          $vue = "../app/Views/".str_replace('.','/', $view).'.html.php';
          require_once $vue;
     }

     public function redirection (string $routes)
     {
          return $this->router->generate($routes);
     }

}