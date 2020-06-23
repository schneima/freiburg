<?php

$folder="content/";
echo"<div id=\"cont_container\">";
$intBack = "<p><a href=\"?content=login\">zur&uuml;ck</a></p>";
$content = GetContent();
switch ($content){
    case "beitritt":
        include($folder.'beitritt.php');
        break;
    case "test":
        // include 'content/test.php';
        break;
    case "geb":
        include("content/geburtstage.php");
        break;
    case "home":
            include("content/home.php");
            break;
    case "aktuell":
            include('content/aktuell.php');
            break;
    case "archiv":
            include('content/aktuell.php');
            break;
    case "about":
            include('content/ueber_uns.php');
            break;
    case "dirigent":
            include('content/dirigent.php');
            break;
    case "vorstand":
            include('content/vorstand.php');
            break;
    case "termine":
            include('content/termine.php');
            break;
    case "kontakt":
            include('content/kontakt.php');
            break;
    case "links":
            include('content/links.php');
            break;
    case "jugend":
            include('content/jugend.php');
            break;
    case "jugendkapelle":
            include('content/jugendkapelle.php');
            break;
    case "bklasse":
            include('content/bklasse.php');
            break;
    case "chronik":
            include('content/chronik.php');
            break;
    case "bilder":
            // include('content/bildernew.php');
            include('content/bilder.php');
            break;
            /*intern*/
    case "login":
            include('content/login.php');
            break;
    case "intdownloads":
            echo $intBack;
            include('content/intdownloads.php');
            break;
    case "intdate":
            echo $intBack;
            include('content/intdate.php');
            break;
    case "intproben":
            echo $intBack;
            include('content/intproben.php');
            break;
    case "intgeb":
            echo $intBack;
            include('content/intgeb.php');
            break;
    case "intfon":
            echo $intBack;
            include('content/intfon.php');
            break;
    case "facebook":
            include('content/facebook.php');
            break;
    case "intmembers":
            echo $intBack;
            include('content/intmembers.php');
            break;
    case "putzplan":
        include 'content/intern/putzplan.php';
        break;
    case "presse":
            include('content/presse.php');
            break;
    case "witz":
            include('content/witz.php');
            break;
    case "datenschutz":
        include 'content/datenschutz.php';
        break;
    case "impressum":
            include('content/impressum.php');
            break;
    case "test":
            include('content/test.php');
            break;
    case "wewantyou":
            include('content/wewantyou_2016.php');
            break;
    case "mitteilungen":
            include('content/mitteilungen.php');
            break;
    default:
            include("content/home.php");
        }
echo"</div>";
?>
