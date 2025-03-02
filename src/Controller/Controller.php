<?php

namespace App\Controller;

use App\Manager;

class Controller 
{

     public function __construct()
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

}