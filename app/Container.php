<?php

namespace App;

use AltoRouter;

class Container 
{

     private static $router;

     public function router ()
     {
          if (self::$router == null) {
               self::$router = new AltoRouter();
          }
          return self::$router;
     }

     public function getController (string $controller)
     {
          return new $controller(App::getApp(), $this->router());
     }

}