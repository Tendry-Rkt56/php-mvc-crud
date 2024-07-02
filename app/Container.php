<?php

namespace App;

use AltoRouter;

class Container 
{

     private static $app;
     private static $router;

     public function getApp ()
     {
          if (self::$app == null) {
               self::$app = new App();
          }
          return self::$app;
     }

     public function router ()
     {
          if (self::$router == null) {
               self::$router = new AltoRouter();
          }
          return self::$router;
     }

     public function getController (string $controller)
     {
          return new $controller($this->getApp(), $this->router());
     }

}