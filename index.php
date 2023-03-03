<?php
    require("db.php");
    require("system/Routing.php");

    $url = key($_GET);
    $router = new Router();
    
    $router -> addRoute('/', "main.php");
    $router -> route("/".$url);
?>