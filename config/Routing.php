<?php

namespace Config;

use AltoRouter;

class Routing
{

     private static $instance;


     public static function getInstance(): AltoRouter
     {
          if (self::$instance == null) self::$instance = new AltoRouter();
          return self::$instance;
     }

}