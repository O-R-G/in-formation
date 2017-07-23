<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/";

if ($uri[1] == "cube") 
    $view .= "cube.php";
else 
    $view .= "docket.php";

require_once("views/head.php");
require_once($view);
require_once("views/foot.php");
?>
