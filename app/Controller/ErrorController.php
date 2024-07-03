<?php

namespace App\Controller;

class ErrorController
{

     public function accessDenied ()
     {
          header('Location: 404.php');
          exit();       
     }

}