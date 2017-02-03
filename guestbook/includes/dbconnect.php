<?php
$verbindung = @mysql_connect($dbhost,$dbuser,$dbpasswd) or die ("Keine Verbindung <br>Bitte Kontrolliere denn Host Name, Benutzername und Passwort.");
@mysql_select_db($dbname) or die ("Falsche Datenbank<br>Bitte Kontrolliere denn Datenbank Name.");
?>
