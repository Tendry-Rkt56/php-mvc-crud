<?php

namespace App;

use Config\Routing;

/**
 * @template T
*/
class Container 
{

     private array $controllers = [];

     /**
      * @template T of object
      * @param class-string<T> $controller
      * @return T
     */
     public function getController(string $controller = '') 
     {
          if (!array_key_exists($controller, $this->controllers)) {
               $this->controllers[$controller] = new $controller(Routing::getInstance());
          }
          return $this->controllers[$controller];
     }

}