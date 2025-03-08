<?php

namespace App\Controller;

use AltoRouter;
use App\Manager;
use Services\Session;

class Controller 
{

     public function __construct(protected AltoRouter $router)
     {
          if (PHP_SESSION_NONE) session_start();
          if (!isset($_SESSION['token'])) Session::set('token', bin2hex(random_bytes(32)));
     }

     protected function render(string $template, array $data = [])
     {
          extract($data);
          $view = '../templates/' . $template;
          require_once $view;
     }

     protected function checkToken(array $data = [])
     {
          if (!isset($data['token']) || $data['token'] !== Session::get('token')) {
               http_response_code(401);
               echo file_get_contents('../templates/errors/unauthorized.html');
               die;
          }
          Session::set('token', bin2hex(random_bytes(32)));
     }

     /**
     * @template T of object
     * @param class-string<T> $table
     * @return T
     */
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