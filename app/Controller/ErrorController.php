<?php

namespace App\Controller;

class ErrorController extends Controller
{

     public function accessDenied ()
     {
          return $this->render('404');
     }

}