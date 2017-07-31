<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);

require_once("views/head.php");

if ($uri[1] == "logo" || $uri[2] == "logo")
    require_once("views/logo.php");
else if ($uri[1] == "")
    require_once("views/docket.php");
    
require_once("views/menu.php");
require_once("views/foot.php");
?>
