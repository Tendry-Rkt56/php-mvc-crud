<?php

namespace Config;

use AltoRouter as GlobalAltoRouter;

class AltoRouter
{

     private static $instance;


     public static function getInstance(): GlobalAltoRouter
     {
          if (self::$instance == null) return new GlobalAltoRouter();
          return self::$instance;
     }

}