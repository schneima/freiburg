<?php
session_start();
include('config.php');
if (file_exists('install.php')) 
{
echo "<meta http-equiv='refresh' content='0;URL=install.php'>";
exit;
}
include('includes/dbconnect.php');
include('includes/function.php');
include('includes/captcha.php');
$header = style('index_body','header');
echo $header;


$body_id = $_GET['id'];
if ($body_id == "beitrag_erstellen")
{
	$beitrag_name = $_POST['name'];
	$beitrag_time = time();
	$beitrag_email = $_POST['email'];
	$beitrag_icq = $_POST['icq'];
	$beitrag_homepage = $_POST['homepage'];
	$beitrag_titel = $_POST['titel'];
	$beitrag_text = $_POST['beitrag'];
	$beitrag_erstellen = $_POST['eintragen'];
	$beitrag_code = strtoupper($_POST['code']);
	$beitrag_vorschau = $_POST['vorschau'];
if ($beitrag_erstellen)
{


if (!$beitrag_name)
{
	$info_text = '!!! Beitrag nicht erstellt !!!<br />Sie Haben kein Namen eingegeben.<br /><a href="index.php?id=beitrag_erstellen">Klick hier</a>, um zum Beitrag Schreiben zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php?id=beitrag_erstellen'>";
}
elseif (!$beitrag_text)
{
	$info_text = '!!! Beitrag nicht erstellt !!!<br />Sie Haben kein Beitrags Text eingegeben.<br /><a href="index.php?id=beitrag_erstellen">Klick hier</a>, um zum Beitrag Schreiben zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php?id=beitrag_erstellen'>";
}
elseif (!$config['captcha'] == "" and $captcha_code !== $beitrag_code)
{
	$info_text = '!!! Beitrag nicht erstellt !!!<br />Bestätigungs-Code wurde nicht oder falsch übernommen.<br /><a href="index.php?id=beitrag_erstellen">Klick hier</a>, um zum Beitrag Schreiben zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php?id=beitrag_erstellen'>";
}
elseif ($config['floodingschutz'] > floor(time() - $_SESSION['floodingschutz']))
{
	$info_text = '!!! Sie haben bereits vor kurzem Beitrag erstellt. !!!<br />Bitte warten Sie etwas, bevor Sie einen weiteren Beitrag erstellt.<br /><a href="index.php?id=beitrag_erstellen">Klick hier</a>, um zum Beitrag Schreiben zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php?id=beitrag_erstellen'>";
}
else
{
	if ($beitrag_homepage == "http://")
	{
		$beitrag_homepage = "";
	}
	$name = mysql_real_escape_string ($name);
$sql = "INSERT INTO ".$dbsql."beitrag (
name,
time,
email,
icq,
homepage,
titel,
beitrag,
ip,
status
) VALUES ( 
'".mysql_real_escape_string ($beitrag_name)."',
'".$beitrag_time."',
'".mysql_real_escape_string ($beitrag_email)."',
'".mysql_real_escape_string ($beitrag_icq)."',
'".mysql_real_escape_string ($beitrag_homepage)."',
'".mysql_real_escape_string ($beitrag_titel)."',
'".mysql_real_escape_string ($beitrag_text)."',
'".$ip."',
'".$config['auto_beitrag_status']."'
)";
if ($ergebnis = mysql_query($sql))
{
	if ($config['auto_beitrag_status'])
	{
		$info_text = 'Danke Ihr Beitrag wurde erstellt.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	}
	else
	{
		$info_text = 'Danke Ihr Beitrag wurde erstellt und muss noch vom Admin Freigeschalten werden.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	}
	
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
	$_SESSION['floodingschutz'] = time();

if ($config['email_gast'] and !empty($beitrag_email))
{
	$admin_email = $config['admin_email'];

	$nachricht = "Hallo $beitrag_name!

Danke dass du dich in Unser Gästebuch eingetragen hast.

Mit freundlichen Grüßen
Ihr Webmaster

------------
Copyright © 2006 - 2007 by http://www.Mapos-Scripts.de
";
@mail($beitrag_email, "Bestaetigung Gaestebucheintrag", "$nachricht", "From: Gaestebuch <$admin_email>");
}	
if ($config['email_senden'])
{
	$admin_name = $config['admin_name'];
	$admin_email = $config['admin_email'];
	$webseite_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];

	$nachricht = "Hallo $admin_name!

Es wurde ein neuer Eintrag von $beitrag_name im Gästebuch gemacht.

Klick hier um zum Gästebuch zu gelangen:

$webseite_url

------------
Copyright © 2006 - 2007 by http://www.Mapos-Scripts.de
";
@mail("$admin_email", "Neuer eintrag im Gaestebuch", "$nachricht", "From: Gaestebuch <$admin_email>");
}

}
else
{
	$info_text = 'Fehler: Beitrag nicht erstellt.<br /><b>'.mysql_error().'</b><br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php?id=beitrag_erstellen'>";

}
}
$box_1 = style("index_body", "box_1");
$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
$box_1 = ereg_replace("{titel}", "Information", $box_1);
$box_1 = ereg_replace("{text}", $info_text, $box_1);
echo $box_1;
}
else
{
$eintrag_body = style('index_body','eintrag');
		if ($beitrag_homepage == "")
		{	
			$beitrag_homepage = "http://";
		}
	if ($beitrag_vorschau) 
	{
		$vorschau_name = htmlspecialchars($beitrag_name);
		$vorschau_name = stripslashes($vorschau_name);

		$vorschau_email = htmlspecialchars($beitrag_email);
		$vorschau_email = stripslashes($vorschau_email);
		$vorschau_icq = htmlspecialchars($beitrag_icq);
		$vorschau_icq = stripslashes($vorschau_icq);
		$vorschau_homepage = htmlspecialchars($beitrag_homepage);
		$vorschau_homepage = stripslashes($vorschau_homepage);
		$vorschau_homepage = homepage($vorschau_homepage);
		$vorschau_titel = htmlspecialchars($beitrag_titel);
		$vorschau_titel = stripslashes($vorschau_titel);			
		if ($vorschau_homepage == "http://")
		{	
			$vorschau_homepage = "";
		}
		
		if (empty($vorschau_email))
		{
			$eintrag_body = ereg_replace("<!-- beitrag_email -->", "[enfernen]", $eintrag_body);
			$eintrag_body = ereg_replace("<!-- /beitrag_email -->", "[/enfernen]", $eintrag_body);
			$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
		}
		if (empty($vorschau_homepage))
		{
			$eintrag_body = ereg_replace("<!-- homepage_email -->", "[enfernen]", $eintrag_body);
			$eintrag_body = ereg_replace("<!-- /homepage_email -->", "[/enfernen]", $eintrag_body);
			$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
		}
		if (empty($vorschau_icq)) 
		{
			$eintrag_body = ereg_replace("<!-- beitrag_icq -->", "[enfernen]", $eintrag_body);
			$eintrag_body = ereg_replace("<!-- /beitrag_icq -->", "[/enfernen]", $eintrag_body);
			$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
		}		
		$vorschau_beitrag = $beitrag_text;
		$vorschau_beitrag = bbcode($vorschau_beitrag);
		$vorschau_beitrag = smilies($vorschau_beitrag);
				
		$eintrag_body = ereg_replace("{vorschau_name}", $vorschau_name, $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_datum}", date("d.m.y", $beitrag_time), $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_zeit}", date("H:i",$beitrag_time), $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_email}", $vorschau_email, $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_icq}", $vorschau_icq, $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_homepage}", $vorschau_homepage, $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_titel}", $vorschau_titel, $eintrag_body);
		$eintrag_body = ereg_replace("{vorschau_beitrag}", $vorschau_beitrag, $eintrag_body);
	}
	else 
	{
		$eintrag_body = ereg_replace("<!-- vorschau -->", "[enfernen]", $eintrag_body);
		$eintrag_body = ereg_replace("<!-- /vorschau -->", "[/enfernen]", $eintrag_body);
		$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
	}

	$eintrag_body = ereg_replace("{name}", stripslashes(htmlspecialchars($beitrag_name)), $eintrag_body);
	$eintrag_body = ereg_replace("{email}", stripslashes(htmlspecialchars($beitrag_email)), $eintrag_body);
	$eintrag_body = ereg_replace("{icq}", stripslashes(htmlspecialchars($beitrag_icq)), $eintrag_body);
	$eintrag_body = ereg_replace("{homepage}", stripslashes(htmlspecialchars($beitrag_homepage)), $eintrag_body);
	$eintrag_body = ereg_replace("{titel}", stripslashes(htmlspecialchars($beitrag_titel)), $eintrag_body);
	$eintrag_body = ereg_replace("{beitrag}", stripslashes(htmlspecialchars($beitrag_text)), $eintrag_body);
	echo $eintrag_body;
}

}
else
{
$index_body = style('index_body','index_body');
$index_body = ereg_replace("<!-- beitrag_body -->", "[enfernen]", $index_body);
$index_body = ereg_replace("<!-- /beitrag_body -->", "[/enfernen]", $index_body);
$index_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "{beitrag_body}", $index_body);
	# seiten
	
	$seitenlinks = 10; // Wieviel Seitenlinks angezeigt werden sollen
	$pro_seite = ( int ) $config['pro_seite'];
	
	$seite = floor($_GET['seite']);
	if ($seite == "" or $seite < 1)
	{
		$seite = 1;
	}
	$count_beitrag = ( int ) $couter_beitaege[0];
	
	$seiten_insgesammt = ceil($count_beitrag / $pro_seite);
	if ($seiten_insgesammt == 0){$seiten_insgesammt = 1;}
	if ($seite >= $seiten_insgesammt){$seite = $seiten_insgesammt;}
	
	$seitenlinks -= 1;
	$for_seiten = round($seitenlinks/2, 2);
	
	$for_seiten_a = floor($for_seiten * 2) + 1;
	
	$for_seiten_b = round($for_seiten_a - 1);
	
	$for_seiten_von = ceil($seite - $for_seiten);
	$for_seiten_bis = $seite + round($for_seiten);
	
	if ($for_seiten_von < 1){$for_seiten_bis = $for_seiten_a;}
	if ($for_seiten_bis > $seiten_insgesammt){$for_seiten_von = $seiten_insgesammt-$for_seiten_b;}
	
	for ($i=1;$i <= $seiten_insgesammt;$i++)
	{ 
		if ($i >= $for_seiten_von and $i <= $for_seiten_bis)
		{
		if ($i == $seite) {$seiten_url .= '<b>';}
		
		$seiten_url .= '<a href="index.php?seite='.$i.'">'.$i.'</a>';	
		
		if ($i == $seite) {$seiten_url .= '</b>';}
		
		if ($i < $seiten_insgesammt) {$seiten_url .= ' ';}
		}
	}
	$seite_vor = floor($seite + 1);
	if ($seite_vor >= $seiten_insgesammt){$seite_vor = $seiten_insgesammt;}
	$seite_zurueck = floor($seite - 1);
	if ($seite_zurueck < 1){$seite_zurueck = 1;}	
	
	$tabellebeitrage_bis = $pro_seite;
	$tabellebeitrage_von = ($pro_seite * $seite) - $pro_seite;
	$index_body = ereg_replace("{seite_zurueck}", ( string ) $seite_zurueck, $index_body);
	$index_body = ereg_replace("{atuelle_seite}", $seiten_url, $index_body);
	$index_body = ereg_replace("{seite_vor}", ( string ) $seite_vor, $index_body);
	# Ende Seiten

if ($_SESSION["user_login"] == true)
{
	$abfrage = "SELECT * FROM ".$dbsql."beitrag ORDER BY time DESC LIMIT $tabellebeitrage_von, $tabellebeitrage_bis";
}
else
{
	$abfrage = "SELECT * FROM ".$dbsql."beitrag WHERE status = '1' ORDER BY time DESC LIMIT $tabellebeitrage_von, $tabellebeitrage_bis";
}
$ergebnis = @mysql_query($abfrage) or die (mysql_error());
while($row = @mysql_fetch_object($ergebnis))
{
	$beitrag = style('index_body','beitrag_body');
	
	if ($row->status == 1)
	{
		$beitrag = ereg_replace("<!-- beitrag_unsichtbar -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_unsichtbar -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);	
	}
	else
	{
		$beitrag = ereg_replace("<!-- beitrag_sichtbar -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_sichtbar -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);		
	}
	
	
	$beitrag_kommentar = $row->kommentar;
	if ($beitrag_kommentar)
	{
		$beitrag_kommentar = "[kommentar]".$row->kommentar."[/kommentar]";
	}
	$beitrag_text = $row->beitrag.$beitrag_kommentar;
	$name = htmlspecialchars($row->name);
	$name = stripslashes($name);
	$beitrag_titel = htmlspecialchars($row->titel);
	$beitrag_titel = stripslashes($beitrag_titel);
	
	$email = htmlspecialchars($row->email);
	$email = stripslashes($email);
	
	$icq = htmlspecialchars($row->icq);
	
	$homepage = htmlspecialchars($row->homepage);
	$homepage = stripslashes($homepage);
	
	$homepage = homepage($homepage);
	$beitrag_ip = htmlspecialchars($row->ip);
	if ($email) 
	{
		$beitrag = ereg_replace("<!-- beitrag_email -->", "", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_email -->", "", $beitrag);			
	} 
	else
	{
		$beitrag = ereg_replace("<!-- beitrag_email -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_email -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);
	}
	if (empty($icq)) 
	{
		$beitrag = ereg_replace("<!-- beitrag_icq -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_icq -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);
	}		
	if ($homepage) 
	{
		$beitrag = ereg_replace("<!-- homepage_email -->", "", $beitrag);
		$beitrag = ereg_replace("<!-- /homepage_email -->", "", $beitrag);			
	} 
	else
	{
		$beitrag = ereg_replace("<!-- homepage_email -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /homepage_email -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);
	}
	if (empty($beitrag_ip)) 
	{
		$beitrag = ereg_replace("<!-- beitrag_ip -->", "[enfernen]", $beitrag);
		$beitrag = ereg_replace("<!-- /beitrag_ip -->", "[/enfernen]", $beitrag);
		$beitrag = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $beitrag);
	}	
	$beitrag_text = bbcode($beitrag_text);
	$beitrag_text = smilies($beitrag_text);
	
	$beitrag = ereg_replace("{id}", $row->id, $beitrag);
	$beitrag = ereg_replace("{name}", $name, $beitrag);
	$beitrag = ereg_replace("{email}", $email, $beitrag);
	$beitrag = ereg_replace("{icq}", $icq, $beitrag);
	$beitrag = ereg_replace("{homepage}", $homepage, $beitrag);
	$beitrag = ereg_replace("{datum}", date("d.m.y", $row->time), $beitrag);
	$beitrag = ereg_replace("{time}", date("H:i",$row->time), $beitrag);
	$beitrag = ereg_replace("{beitrag_titel}", $beitrag_titel, $beitrag);
	$beitrag = ereg_replace("{beitrag}", $beitrag_text, $beitrag);
	$beitrag = ereg_replace("{ip}", $beitrag_ip, $beitrag);
	$beitrag_body .= $beitrag;
}
if (empty($beitrag_body))
{
	$info_text = 'Es wurden noch keine Einträge geschrieben.<br />Möchten Sie der erste sein, dann <a href="index.php?id=beitrag_erstellen">Klick hier</a>, um ein Eintrag zu erstellen';
	$box_1 = style("index_body", "box_1");
	$box_1 = ereg_replace("{titel}", "Information", $box_1);
	$box_1 = ereg_replace("{text}", $info_text, $box_1);
	$beitrag_body = $box_1;
}
$index_body = ereg_replace("{beitrag_body}", $beitrag_body, $index_body);
echo $index_body;
}
$footer = style('index_body','footer');
echo $footer;
mysql_close($verbindung);
exit;
?>