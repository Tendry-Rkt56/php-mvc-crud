<?php

namespace App\Controller;

use AltoRouter;
use App\Manager;

class Controller 
{


     public function __construct(protected AltoRouter $router)
     {
          if (PHP_SESSION_NONE) session_start();
     }

     protected function render(string $template, array $data = [])
     {
          extract($data);
          $view = '../templates/' . $template;
          require_once $view;
     }

     public function getEntity(string $table = '') 
     {

          return Manager::getInstance()->getEntity($table);

     }

     public function redirect(string $route = '', array $params = [])
     {
          header('Location: '.$this->router->generate($route, $params));
          exit;
     }

}