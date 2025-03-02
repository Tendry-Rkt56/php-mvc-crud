<?php

namespace Services;

class Session
{

     public static function set(string $type = '', mixed $message)
     {

          $_SESSION[$type] = $message;

     }

     public static function get(string $type = '')
     {
          return $_SESSION[$type];
     }

     public static function delete(string $type = '')
     {
          if (array_key_exists($type, $_SESSION)) {
               unset($_SESSION[$type]);
          }
     }

     public static function destroy()
     {
          unset($_SESSION);
          session_destroy();
     }

}