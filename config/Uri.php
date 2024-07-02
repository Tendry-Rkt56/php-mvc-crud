<?php

$uri = $_SERVER['REQUEST_URI'];
if (!empty($uri) && $uri[-1] == "/") {
     header('Location: '.substr($uri, 0, -1));
     exit();
}

?>