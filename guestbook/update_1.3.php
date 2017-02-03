<?php

?>
<html>

<head>
<title>Gästebuch Version 1.2.x auf 1.3 Update</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<h2>Gästebuch Version 1.2.x auf 1.3 Update</h2>
<?php

if ($_POST['abbruch'])
{
echo '<script>close();</script>';
}
elseif ($_POST['weiter_to_update'])
{
include('config.php');

if ($dbhost and $dbuser and $dbpasswd and $dbname)
{
$verbindung = @mysql_connect($dbhost,$dbuser,$dbpasswd) or die ("Keine Verbindung <br>Bitte Kontrolliere denn Host Name, Benutzername und Passwort.");
@mysql_select_db($dbname) or die ("Falsche Datenbank<br>Bitte Kontrolliere denn Datenbank Name.");


$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'captcha'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'captcha',
'1'
)");
}

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'gaestebuch_titel'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'gaestebuch_titel',
'Mapos-Scripts.de Gaestebuch 1.3'
)");
}
$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'version'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'version',
'1.3'
)");
}
$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'floodingschutz'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'floodingschutz',
'30'
)");
}
$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'kommentar_titel'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'kommentar_titel',
'Kommentar von Admin'
)");
}

echo "Das Update wurde erfolgreich Beendet.<br><a href='index.php'>Klick hier</a>, um zur Gästebuch zurückzukehren.<br>";



if (file_exists("update.php")) 
{
	if(!@unlink("update.php"))
	{
	echo "Bitte entferne die update.php aus deinem Webspace.<br>";
	}
}
if (file_exists("install.php")) 
{
	if(!@unlink("install.php"))
	{
	echo "Bitte entferne die install.php aus deinem Webspace.<br>";
	}
}

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'admin_name'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
$name = $row->aksion;

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'admin_email'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
$email = $row->aksion;

$info_text .= "<img src='http://www.mapos-scripts.de/install_log/log.php?mapos=".base64_encode ("$name|$email|3")."' border='0' width='0' height='0'>";
mysql_close($verbindung);
}
else
{
	echo "Config Datei hat keine einträge.<br>";
}
}
else
{
?>
<form name="copyright" method="post" action="update.php">
    <p><textarea name="copyright" rows="15" cols="73">Gästebuch Version 1.3
Copyright (c) 2006 - 2007 by Mapos-Scripts.de Alle Rechte vorbehalten.
eMail: support@mapos-scripts.de
www.mapos-scripts.de
Gaestbuch 1.3 ist Freeware!

Copyright

Dieses Script ist Freeware. Es darf frei vervielfältigt, weitergegeben und natürlich benutzt werden. Jeder Benutzer darf das Script, ausgenommen vom Copyright, frei verändern und seinen Bedürfnissen anpassen.
Wird es jedoch weitergegeben, muß es in seiner Originalfassung sein!! Bei Benutzung ist es nett, mir eine eMail o.Ä. zu schicken, damit ich weiß, wies euch gefällt (support@mapos-scripts.de).
Das Script wurde ausgiebig auf seine Funktionalität und Ungefährlichkeit geprüft, bei trotzdem entstandenen Schäden durch dieses Programm hafte ich nicht!!
DER COPYRIGHT DARF AUFKEINEN FALL ENTFERNT ODER VERÄNDERT WERDEN!!!
Nur an den Farben darf gebastelt werden. Es muß allerdings noch gut sichtbar sein.</textarea></p>
    <p><input type="submit" name="weiter_to_update" value="Update"><input type="submit" name="abbruch" value="Abbruch"></p>
</form>
<p id="copyrigt">Copyright © 2006 - 2007 by <a href="http://www.Mapos-Scripts.de" target="_blank">Mapos-Scripts.de</a><br>Version 1.2</p>
</body>

</html>
<?php
}

?>