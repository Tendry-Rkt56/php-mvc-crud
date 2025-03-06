<?php

namespace App;

use Config\Routing;

class Container 
{

     private array $controllers = [];

     public function getController(string $controller = '') 
     {
          if (!array_key_exists($controller, $this->controllers)) {
               $this->controllers[$controller] = new $controller(Routing::getInstance());
          }
          return $this->controllers[$controller];
     }

}