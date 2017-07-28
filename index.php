<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/";

if ($uri[1] == "cube" || $uri[2] == "cube") 
    $view .= "docket.php";
else 
    $view .= "menu.php";

require_once("views/head.php");
require_once($view);
require_once("views/foot.php");
?>
