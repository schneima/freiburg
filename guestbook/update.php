<?php

?>
<html>

<head>
<title>Gästebuch Version 1.3 auf 1.4 Update</title>
<link rel="stylesheet" type="text/css" href="design/css/styles.css">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<h2>Gästebuch Version 1.3 auf 1.4 Update</h2>
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

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'auto_beitrag_status'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'auto_beitrag_status',
'1'
)");
}

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'email_gast'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'email_gast',
'1'
)");
}
$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'beitrag_titel'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'beitrag_titel',
'1'
)");
}

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'beitrag_icq'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'beitrag_icq',
'1'
)");
}

$loeche = "DELETE FROM ".$dbsql."config WHERE name = 'version'";
@mysql_query($loeche);

$abfrage = "SELECT * FROM ".$dbsql."config WHERE name = 'version'";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
if (!$row)
{
mysql_query("
INSERT INTO ".$dbsql."config (name, aksion) VALUES (
'version',
'1.4'
)");
}
		if (strlen($config['admin_passwort']) < 30)
		{
			$admin_passwort = md5($config['admin_passwort']);
			$eintrag = "UPDATE ".$dbsql."config Set aksion = '$admin_passwort' WHERE name = 'admin_passwort'";
			@mysql_query($eintrag);
		}
	$sql = "ALTER TABLE ".$dbsql."beitrag ADD icq int(11) NOT NULL AFTER email";
	@mysql_query($sql);
	$sql = "ALTER TABLE ".$dbsql."beitrag ADD titel varchar(255) NOT NULL AFTER homepage";
	@mysql_query($sql);
	$sql = "ALTER TABLE ".$dbsql."beitrag ADD status int(11) NOT NULL AFTER ip";
	@mysql_query($sql);
	
	$eintrag = "UPDATE ".$dbsql."beitrag Set status = '1'";
	@mysql_query($eintrag);
			
echo "Das Update wurde erfolgreich Beendet.<br><a href='index.php'>Klick hier</a>, um zur Gästebuch zurückzukehren.<br>";
if (file_exists("update.php")) 
{
	@chmod ("update.php", 0777);
	if(!@unlink("update.php"))
	{
	echo "Bitte entferne die update.php aus deinem Webspace.<br>";
	}
}
if (file_exists("install.php")) 
{
	@chmod ("install.php", 0777);
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

$info_text .= "<img src='http://www.mapos-scripts.de/install_log/log.php?mapos=".base64_encode ("$name|$email|9")."' border='0' width='0' height='0'>";
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
    <p><textarea name="copyright" rows="15" cols="73">Gästebuch Version 1.4
Copyright (c) 2006 - 2007 by Mapos-Scripts.de Alle Rechte vorbehalten.
eMail: support@mapos-scripts.de
www.mapos-scripts.de
Gaestbuch 1.4 ist Freeware!

Copyright

Dieses Script ist Freeware. Es darf frei vervielfältigt, weitergegeben und natürlich benutzt werden. Jeder Benutzer darf das Script, ausgenommen vom Copyright, frei verändern und seinen Bedürfnissen anpassen.
Wird es jedoch weitergegeben, muß es in seiner Originalfassung sein!! Bei Benutzung ist es nett, mir eine eMail o.Ä. zu schicken, damit ich weiß, wies euch gefällt (support@mapos-scripts.de).
Das Script wurde ausgiebig auf seine Funktionalität und Ungefährlichkeit geprüft, bei trotzdem entstandenen Schäden durch dieses Programm hafte ich nicht!!
DER COPYRIGHT DARF AUFKEINEN FALL ENTFERNT ODER VERÄNDERT WERDEN!!!
Nur an den Farben darf gebastelt werden. Es muß allerdings noch gut sichtbar sein.</textarea></p>
    <p><input type="submit" name="weiter_to_update" value="Update"><input type="submit" name="abbruch" value="Abbruch"></p>
</form>
<p id="copyrigt">Copyright © 2006 - 2007 by <a href="http://www.Mapos-Scripts.de" target="_blank">Mapos-Scripts.de</a><br>Version 1.4</p>
</body>

</html>
<?php
}

?>