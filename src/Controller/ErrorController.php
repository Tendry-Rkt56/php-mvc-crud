<?php

namespace App\Controller;

class ErrorController extends Controller
{

     public function page404()
     {
          return $this->render('errors/404.html');
     }

}