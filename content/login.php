<?php
echo"	<h2>Mitgliederbereich</h2>";
echo"<p>".$message."</p>";

if($bLoggedIn)
{
	switch($bn)
	{
		case "musiker":
                    printNavi();
                    break;
		case "admin": 
                    AdminNavi();
                    break;
		default:
			echo "Benutzer nicht erkannt!";
	}
}else{
	printLoginForm();
}

function printLoginForm()
{
	$cBtn = "<input name=\"login\" type=\"submit\" value=\".: Anmelden :.\" onClick=\"\">";

	echo"
	<form onMouseOver=\"\" action=\"?content=login\" method=\"post\">
	<table>
	<tr><td>Benutzername </td><td><input class=\"daten\" type=\"text\" name=\"bn\"></td></tr>
	<tr><td>Passwort</td><td><input class=\"daten\" type=\"password\" name=\"pw\"></td></tr>
	<tr><td></td><td align=\"center\"><br>".$cBtn."</td></tr></table>
	</form>
	";

	$monthen = date("n");
	$monat = getGermanMonth($monthen);
	// echo"<p>Heute ist der <strong>".date("d")."</strong>. ".$monat." ;-)</p>";

	echo "<p>Es m&uuml;ssen Cookies zugelassen sein f&uuml;r diese Seite</p>";
}

function printNavi()
{
    /*
	echo"<div id=\"nextBirthdays\">";
	include('content/geburtstage.php');
	echo"</div>";
     */
    include 'content/intern/menu.php';

    
}

function myErrorHandler($fehlercode, $fehlertext, $fehlerdatei, $fehlerzeile)
{
    if (!(error_reporting() & $fehlercode)) {
        // Dieser Fehlercode ist nicht in error_reporting enthalten
        return;
    }

    switch ($fehlercode) {
    case E_USER_ERROR:
        echo "<b>Mein FEHLER</b> [$fehlercode] $fehlertext<br />\n";
        echo "  Fataler Fehler in Zeile $fehlerzeile in der Datei $fehlerdatei";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Abbruch...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>Meine WARNUNG</b> [$fehlercode] $fehlertext<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>Mein HINWEIS</b> [$fehlercode] $fehlertext<br />\n";
        break;

    default:
        echo "Unbekannter Fehlertyp: [$fehlercode] $fehlertext<br />\n";
        break;
    }

    /* Damit die PHP-interne Fehlerbehandlung nicht ausgeführt wird */
    return true;
}


function AdminNavi()
{
    $alter_error_handler = set_error_handler("myErrorHandler");
    require_once 'incs/utils.class.php';
    include 'content/intern/menu.php';
    
}

?>