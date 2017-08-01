<?
$config = "open-records-generator/config/config.php";
$config_dir = "config/";

require_once($config);
require_once($config_dir."url.php");
require_once($config_dir."request.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
$nav = $oo->nav($uu->ids);
$title = "in-formation";
$date = date("l d/m/Y");
?><script>
    var date = "<? echo $date; ?>";
</script>

<!DOCTYPE html>
<html>
	<head>
        <title><? echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="in-formation">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon" href="/media/png/apple-touch-icon.png" />
        <link rel="stylesheet" href="/static/css/main.css">
        <link rel="stylesheet" href="/static/css/docket.css">
        <link rel="stylesheet" href="/static/css/menu.css">
        <link rel="stylesheet" href="/static/css/logo.css">
        <link rel="stylesheet" href="/static/fonts/cmun-serif/cmun-serif.css">
		<link rel="apple-touch-icon" href="/media/png/touchicon.png" />
	</head>
	<body>
        <!-- <div id="in-formation">Institute of Contemporary Arts</div> -->
        <div id="in-formation" class=""><? echo $date; ?></div> 
        <!-- <div id="in-formation">In Formation</div> -->
        <!-- <div id="in-formation">Dev</div> -->
        <!-- <div id="in-formation">Exhibitions</div> -->
        <!-- <div id="in-formation" class='red'>Films</div> -->
        <!-- <div id="in-formation" class='green'>Exhibitions</div> -->
        <!-- <div id="in-formation" class='blue'>Live</div> -->
