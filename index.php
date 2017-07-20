<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/object.php";

require_once("views/head.php");
// require_once("views/information.php");       // hardcoded
// require_once("views/docket.php");            // open-rec-gen
require_once("views/cube.php");
// require_once($view);
require_once("views/foot.php");
?>
