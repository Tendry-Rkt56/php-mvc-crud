<?php

namespace App\Controller;

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

}