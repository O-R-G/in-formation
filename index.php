<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
require_once("views/head.php");    

if ($uri[1] == 'i-c-a') {
    require_once("views/i-c-a.php");
} else if ($uri[1] == 'triangle') {
    require_once("views/triangle.php");
} else {
    require_once("views/header.php");
    require_once("views/docket.php");
    require_once("views/menu.php");    
    require_once("views/logo.php");
}

require_once("views/foot.php");
?>
