<?php

namespace App\Models\Table;

use Config\DataBase;

class Table 
{

     public function __construct (protected DataBase $db)
     {
     }

}

?>