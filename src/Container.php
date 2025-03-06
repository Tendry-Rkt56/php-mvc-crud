<?php

namespace App;

use Config\Routing;

class Container 
{

     private static $instance;
     private array $controllers = [];

     public static function get(): self
     {
          if (self::$instance == null) self::$instance = new self();
          return self::$instance;
     } 

     public function getController(string $controller = '') 
     {
          if (!array_key_exists($controller, $this->controllers)) {
               $this->controllers[$controller] = new $controller(Routing::getInstance());
          }
          return $this->controllers[$controller];
     }

}