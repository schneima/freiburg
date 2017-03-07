<?php
require_once 'incs/siteConfiguraton.php';
require_once 'incs/securityLib.php';

ini_set('arg_separator.output', '&amp;');
        
if($isLocal)
{
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    ini_set('error_reporti ng', E_ALL);
}

$message = null;
function GetContent()
{
    $content="home";
    if(isset($_GET['content']))
        $content=$_GET['content'];

    return $content;
}

// ADD JAVASCRIP for scrolling realtive to px
?>

<!DOCTYPE html> 
<html lang="de">
<head>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8"> 

<title>Musikverein Bollschweil</title>
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="incs/general.css">
<link rel="stylesheet" type="text/css" href="incs/layout.css">
<link rel="stylesheet" type="text/css" href="incs/navi.css">
<link rel="stylesheet" type="text/css" href="incs/classes.css">

<link rel="SHORTCUT ICON" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="shadowbox-3.0.3/shadowbox.css">
<script type="text/javascript" src="./shadowbox-3.0.3/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>
<script src="incs/functions.js" type="text/javascript"></script>

</head>
<body >
<?php

include('./incs/header.php');
include('./incs/navi.php');
include './content.php';
include('./incs/footer.php');

?>
    

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9143172-2");
pageTracker._trackPageview();
} catch(err) {}</script>
<!--
<script type="text/javascript">
    window.onscroll = function() 
    {
        document.getElementById('bg').style.top = (window.pageYOffset * -0.25) + 'px';
    }
</script>
<div id="bg">
    <img id="bg1" src="images/background/blue-background.jpg" alt="Logo"/>
</div>
    
 -->

</body>
</html>
