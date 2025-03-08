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
          Session::set('token', bin2hex(random_bytes(32)));
     }

     protected function render(string $template, array $data = [])
     {
          extract($data);
          $view = '../templates/' . $template;
          require_once $view;
     }

     protected function checkToken(array $data = [])
     {
          if ($data['token'] !== Session::get('token')) {
               file_put_contents(
                    '../templates/errors/404.html', 
                    str_replace(['ERROR 404', 'Page introuvable'], ['UNAUTHORIZED', 'Cette action n\'est pas autorisée'],
                    file_get_contents('../templates/errors/404.html'))
               );
               echo file_get_contents('../templates/errors/404.html');
               die;
          }
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