<?php
session_start();
include('config.php');
include('includes/dbconnect.php');
include('includes/function.php');

$header = style('index_body','header');
echo $header;

if ($_POST['login'])
{
	$name = trim($_POST['name']);
	$password = trim($_POST['password']);
	
	if ($config['admin_neu_passwort'] == $password)
	{
		$admin_passwort = $config['admin_neu_passwort'];
		$pw_update = true;
	}
	else
	{
		$password = md5($password);
		$admin_passwort = $config['admin_passwort'];
	}
	
	if (empty($name) or empty($password))
	{
		$info_text = 'Sie haben kein Benutzername oder Passwort angegeben.<br /><a href="admin.php">Klick hier</a>, um zum Login zurückzukehren.';
		$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php'>";		
	}
	elseif ($config['admin_name'] == $name and $admin_passwort == $password)
	{
		$_SESSION["user_name"] = $config['admin_name'];
		$_SESSION["user_login"] = true;
		
		if ($pw_update == true)
		{
			$admin_passwort = md5($admin_passwort);
			$eintrag = "UPDATE ".$dbsql."config Set aksion = '$admin_passwort' WHERE name = 'admin_passwort'";
			if (@mysql_query($eintrag))
			{
				$loeche = "DELETE FROM ".$dbsql."config WHERE name = 'admin_neu_passwort'";
				@mysql_query($loeche);
			}
		}
		
		$info_text = 'Sie sind eingeloggt.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
  	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
	}
	else
	{
		$info_text = 'Falscher Benutzername oder Passwort.<br /><a href="admin.php">Klick hier</a>, um zum Login zurückzukehren.';
		$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php'>";
	}

	$box_1 = style("index_body", "box_1");
	$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
	$box_1 = ereg_replace("{titel}", "Information", $box_1);
	$box_1 = ereg_replace("{text}", $info_text, $box_1);
	echo $box_1;
}
elseif ($_GET['aksion'] == "passwort_vergessen")
{
	if ($_POST['zuschicken'])
	{
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		
		if (!empty($name) and !empty($email))
		{
			$admin_name = $config['admin_name'];
			if ($admin_name == $name and $config['admin_email'] == $email)
			{
				$neu_pw = neu_pw('8');
				@mysql_query("INSERT INTO ".$dbsql."config (name, aksion) VALUES ('admin_neu_passwort','$neu_pw')");

				$webseite_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
				$mail_betrff = "Die angeforderten Zugangs-Daten";
				$mail_text = "Hallo $admin_name!\nDeinen Neuen Zugangsdaten gibst du hier ein.\n$webseite_url\n\nDeine Zugangs-Daten:\n\nBenutzername: $admin_name\nPasswort: $neu_pw\n\n------------\nCopyright © 2006 - 2007 by http://www.Mapos-Scripts.de";
			
				if (@mail($email, $mail_betrff, $mail_text, "From: Gaestebuch <$email>"))
				{
					$info_text = 'Deine Neuen Zugangs-Daten wurden an dir gesendet.<br /><a href="admin.php">Klick hier</a>, um zum Login zurückzukehren.';
				}
				else
				{
					$info_text = 'Fehler: Es konnte keine eMail an dich gesendet werden.<br /><a href="admin.php">Klick hier</a>, um zum Login zurückzukehren.';
				}
				$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php'>";
			}
			else
			{
				$info_text = 'Sie sind nicht der Admin.<br /><a href="admin.php">Klick hier</a>, um zum Password zuschicken zurückzukehren.';
				$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php?aksion=passwort_vergessen'>";
			}
		}
		else
		{
			$info_text = 'FEHLER: Keine Volständigen angaben.<br /><a href="admin.php">Klick hier</a>, um zum Password zuschicken zurückzukehren.';
			$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php?aksion=passwort_vergessen'>";
		}

		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;
	}
	else
	{
		$passwort_vergessen = style('admin_body','passwort_vergessen');
		echo $passwort_vergessen;
	}
}
elseif ($_GET['logout'] == "true")
{

	unset($_SESSION["user_name"]);
	unset($_SESSION["user_login"]);
	$info_text = 'Sie sind ausgelogt.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
	$box_1 = style("index_body", "box_1");
	$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
	$box_1 = ereg_replace("{titel}", "Information", $box_1);
	$box_1 = ereg_replace("{text}", $info_text, $box_1);
	echo $box_1;
}
else
{
if ($_SESSION["user_login"] == true)
{
	$beitrag = $_GET['beitrag'];
	if ($beitrag == "sichtbar" or $beitrag == "unsichtbar")
	{
		$beitrag_id = $_GET['id'];
		if ($beitrag == "sichtbar")
		{
			$beitrag_status = 1;
		}
		else
		{
			$beitrag_status = 0;
		}

		$update = "UPDATE ".$dbsql."beitrag Set status = '$beitrag_status' WHERE id = '$beitrag_id'";
		if (@mysql_query($update))
		{
			if ($beitrag_status == 1)
			{
				$beitrag_status = 1;
				$info_text = 'Beitrag wurde auf Sichtbar geändert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			}
			else
			{
				$beitrag_status = 0;
				$info_text = 'Beitrag wurde auf Unsichtbar geändert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			}	
		}
		else
		{
			$info_text = 'Beitrag wurde nicht geändert.<br /><b>'.mysql_error().'</b><br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
		}
		$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;		
	}
	elseif ($beitrag == "edit")
	{
		$beitrag_id = $_GET['id'];
		if (!$beitrag_id)
		{
			$beitrag_id = $_POST['beitrag_id'];
		}
			$beitrag_name = $_POST['name'];
			$beitrag_time = time();
			$beitrag_email = $_POST['email'];
			$beitrag_icq = $_POST['icq'];
			$beitrag_homepage = $_POST['homepage'];
			$beitrag_titel = $_POST['titel'];
			$beitrag_text = $_POST['beitrag'];
			$beitrag_erstellen = $_POST['eintragen'];
			$beitrag_code = $_POST['code'];
			$beitrag_vorschau = $_POST['vorschau'];
	if ($beitrag_erstellen)
	{
			$beitrag_id = $_POST['beitrag_id'];
	if (!$beitrag_name)
	{
			$info_text = 'Beitrag wurde nicht Editiert.<br />Sie Haben kein Namen eingegeben.<br /><a href="admin.php?beitrag=edit&id='.$beitrag_id.'">Klick hier</a>, um zum Beitrag Editieren zurückzukehren.';
			$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php?beitrag=edit&id=$beitrag_id'>";
	}
	elseif (!$beitrag_text)
	{
			$info_text = 'Beitrag wurde nicht Editiert.<br />Sie Haben kein Beitrags Text eingegeben.<br /><a href="admin.php?beitrag=edit&id='.$beitrag_id.'">Klick hier</a>, um zum Beitrag Editieren zurückzukehren.';
			$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php?beitrag=edit&id=$beitrag_id'>";
	}
	else
	{
		if ($beitrag_homepage == "http://")
		{
				$beitrag_homepage = "";
		}
		$sql = "UPDATE ".$dbsql."beitrag Set 
		name = '".mysql_real_escape_string ($beitrag_name)."', 
		email = '".mysql_real_escape_string ($beitrag_email)."', 
		icq = '".mysql_real_escape_string ($beitrag_icq)."', 
		homepage = '".mysql_real_escape_string ($beitrag_homepage)."', 
		titel = '".mysql_real_escape_string ($beitrag_titel)."', 
		beitrag = '".mysql_real_escape_string ($beitrag_text)."' 
		WHERE id = '$beitrag_id'";
		if ($ergebnis = mysql_query($sql))
		{
			$info_text = 'Beitrag wurde Editiert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";

		}
		else
		{
			$info_text = 'Fehler: Beitrag wurde nicht Editiert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
		
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
		$eintrag_body = style('admin_body','edit_body');
		if ($beitrag_homepage == "")
		{	
			$beitrag_homepage = "http://";
		}
		if ($beitrag_vorschau) 
		{
			$vorschau_name = htmlspecialchars($beitrag_name);
			$vorschau_name = stripslashes($vorschau_name);
			$vorschau_beitrag = $beitrag_text;
			$vorschau_beitrag = bbcode($vorschau_beitrag);
			$vorschau_beitrag = smilies($vorschau_beitrag);

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
		
			if (!$vorschau_email)
			{
				$eintrag_body = ereg_replace("<!-- beitrag_email -->", "[enfernen]", $eintrag_body);
				$eintrag_body = ereg_replace("<!-- /beitrag_email -->", "[/enfernen]", $eintrag_body);
				$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
			}
			if (!$vorschau_homepage)
			{
				$eintrag_body = ereg_replace("<!-- homepage_email -->", "[enfernen]", $eintrag_body);
				$eintrag_body = ereg_replace("<!-- /homepage_email -->", "[/enfernen]", $eintrag_body);
				$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
			}
			if (!$vorschau_icq)
			{
				$eintrag_body = ereg_replace("<!-- beitrag_icq -->", "[enfernen]", $eintrag_body);
				$eintrag_body = ereg_replace("<!-- /beitrag_icq -->", "[/enfernen]", $eintrag_body);
				$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
			}		
			$eintrag_body = ereg_replace("{vorschau_name}", $vorschau_name, $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_datum}", date("d.m.y"), $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_zeit}", date("H:i"), $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_email}", $vorschau_email, $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_icq}", $vorschau_icq, $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_homepage}", $vorschau_homepage, $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_titel}", $vorschau_titel, $eintrag_body);
			$eintrag_body = ereg_replace("{vorschau_beitrag}", $vorschau_beitrag, $eintrag_body);
		}
		else 
		{
			$beitrag_id = $_GET['id'];
			if (!$beitrag_id)
			{
				$beitrag_id = $_POST['beitrag_id'];
			}		
			$eintrag_body = ereg_replace("<!-- vorschau -->", "[enfernen]", $eintrag_body);
			$eintrag_body = ereg_replace("<!-- /vorschau -->", "[/enfernen]", $eintrag_body);
			$eintrag_body = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $eintrag_body);
		
			$abfrage = "SELECT * FROM ".$dbsql."beitrag WHERE id = '$beitrag_id'";
			$ergebnis = mysql_query($abfrage);
			$row = mysql_fetch_object($ergebnis);
	
			$beitrag_name = $row->name;
			$beitrag_email = $row->email;
			$beitrag_icq = $row->icq;
			if (!$beitrag_icq){unset($beitrag_icq);}
			$beitrag_homepage = $row->homepage;
			$beitrag_titel = $row->titel;
			$beitrag_text = $row->beitrag;
		}

	
		$eintrag_body = ereg_replace("{beitrags_id}", $beitrag_id, $eintrag_body);
		$eintrag_body = ereg_replace("{name}", stripslashes(htmlspecialchars($beitrag_name)), $eintrag_body);
		$eintrag_body = ereg_replace("{email}", stripslashes(htmlspecialchars($beitrag_email)), $eintrag_body);
		$eintrag_body = ereg_replace("{icq}", stripslashes(htmlspecialchars($beitrag_icq)), $eintrag_body);
		$eintrag_body = ereg_replace("{homepage}", stripslashes(htmlspecialchars($beitrag_homepage)), $eintrag_body);
		$eintrag_body = ereg_replace("{titel}", stripslashes(htmlspecialchars($beitrag_titel)), $eintrag_body);
		$eintrag_body = ereg_replace("{beitrag}", stripslashes(htmlspecialchars($beitrag_text)), $eintrag_body);
		echo $eintrag_body;
	}
}
elseif ($beitrag == "loeschen")
{

	if ($_POST['ja'])
	{
		$beitrags_id = $_POST['beitrags_id'];
		$loeche = "DELETE FROM ".$dbsql."beitrag WHERE id = '$beitrags_id'";
			if ($loeche_ergebnis = mysql_query($loeche))
			{
				$info_text = 'Beitrag wurde gelöscht.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			}
			else
			{
				$info_text = 'FEHLER: Beitrag wurde nicht gelöscht.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
			}
		$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;
	}
	elseif ($_POST['nein'])
	{
		$info_text = 'Beitrag wurde nicht gelöscht.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
		$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;
	}
	else
	{
		$loeschen_body  = style('admin_body','loeschen_body');
		$beitrag_id = $_GET['id'];
		$loeschen_body = ereg_replace("{beitrags_id}", $beitrag_id, $loeschen_body);
		echo $loeschen_body;
	}

}
elseif ($beitrag == "kommentar")
{
	$beitrag_kommentar = $_POST['beitrag'];
	$beitrag_erstellen = $_POST['eintragen'];
	$beitrag_vorschau = $_POST['vorschau'];
	$beitrag_id = $_GET['id'];
	
	if (!$beitrag_id)
	{
		$beitrag_id = $_POST['beitrag_id'];
	}
	
if ($beitrag_erstellen)
{
	$beitrag_id = $_POST['beitrag_id'];
	if ($beitrag_homepage == "http://")
	{
		$beitrag_homepage = "";
	}
$sql = "UPDATE ".$dbsql."beitrag Set kommentar = '".mysql_real_escape_string ($beitrag_kommentar)."' WHERE id = '$beitrag_id'";
if ($ergebnis = mysql_query($sql))
{
	$info_text = 'Beitrag Kommentar geändert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";

}
else
{
	$info_text = 'Fehler: Beitrag Kommentar nicht geändert.<br /><a href="index.php">Klick hier</a>, um zum Gästebuch zurückzukehren.';
	$info_text .= "<meta http-equiv='refresh' content='5;URL=index.php'>";
}

$box_1 = style("index_body", "box_1");
$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
$box_1 = ereg_replace("{titel}", "Information", $box_1);
$box_1 = ereg_replace("{text}", $info_text, $box_1);
echo $box_1;
}
else
{

		$abfrage = "SELECT * FROM ".$dbsql."beitrag WHERE id = '$beitrag_id'";
		$ergebnis = mysql_query($abfrage);
		$row = mysql_fetch_object($ergebnis);

		$beitrag_name = $row->name;
		$beitrag_email = $row->email;
		$beitrag_icq = $row->icq;
		$beitrag_homepage = $row->homepage;
		$beitrag_titel = $row->titel;
		$beitrag_text = $row->beitrag;
		
		$vorschau_name = htmlspecialchars($beitrag_name);
		$vorschau_name = stripslashes($vorschau_name);
		$vorschau_homepage = htmlspecialchars($beitrag_homepage);
		$vorschau_homepage = stripslashes($vorschau_homepage);	
		$vorschau_beitrag = $beitrag_text;
	if ($beitrag_vorschau) 
	{
		if (!empty($beitrag_kommentar))
		{	
			$vorschau_beitrag .= "[kommentar]".$beitrag_kommentar."[/kommentar]";
		}
	}
	else 
	{
		$beitrag_kommentar = $row->kommentar;
		if ($beitrag_kommentar)
		{
			$vorschau_beitrag .= "[kommentar]".$row->kommentar."[/kommentar]";
		}
		
	}
		$vorschau_email = htmlspecialchars($beitrag_email);
		$vorschau_email = stripslashes($vorschau_email);
		$vorschau_icq = htmlspecialchars($beitrag_icq);
		$vorschau_icq = stripslashes($vorschau_icq);
		$vorschau_homepage = htmlspecialchars($beitrag_homepage);
		$vorschau_homepage = stripslashes($vorschau_homepage);
		$vorschau_homepage = homepage($vorschau_homepage);
		$vorschau_titel = htmlspecialchars($beitrag_titel);
		$vorschau_titel = stripslashes($vorschau_titel);
		$eintrag_body = style('admin_body','kommentar_body');
		if ($beitrag_homepage == "")
		{	
			$beitrag_homepage = "http://";
		}
		$vorschau_beitrag = bbcode($vorschau_beitrag);
		$vorschau_beitrag = smilies($vorschau_beitrag);
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
	$eintrag_body = ereg_replace("{vorschau_name}", $vorschau_name, $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_datum}", date("d.m.y"), $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_zeit}", date("H:i"), $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_email}", $vorschau_email, $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_homepage}", $vorschau_homepage, $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_icq}", $vorschau_icq, $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_titel}", $vorschau_titel, $eintrag_body);
	$eintrag_body = ereg_replace("{vorschau_beitrag}", $vorschau_beitrag, $eintrag_body);	
	
	$eintrag_body = ereg_replace("{beitrags_id}", $beitrag_id, $eintrag_body);
	$eintrag_body = ereg_replace("{beitrag}", stripslashes(htmlspecialchars($beitrag_kommentar)), $eintrag_body);
	echo $eintrag_body;

}
}
else
{
	$zugang_aendern = $_POST['zugang_aendern'];
	$gb_aendern = $_POST['gb_aendern'];		
	if ($zugang_aendern)
	{			
		$name = mysql_real_escape_string ($_POST['name']);
		$email = mysql_real_escape_string ($_POST['email']);
		$password[1] = $_POST['password1'];
		$password[2] = $_POST['password2'];

		if ($name and $email and $password[1] and $password[2])
		{
			if ($password[1] == $password[2])
			{
				$admin_passwort = md5($password[1]);
				$eintrag = "UPDATE ".$dbsql."config Set aksion = '$name' WHERE name = 'admin_name'";
				if ($eintrage = mysql_query($eintrag))
				{
					$eintrag = "UPDATE ".$dbsql."config Set aksion = '$email' WHERE name = 'admin_email'";
					if ($eintrage = mysql_query($eintrag))
					{
						$eintrag = "UPDATE ".$dbsql."config Set aksion = '$admin_passwort' WHERE name = 'admin_passwort'";
						if ($eintrage = mysql_query($eintrag))
						{
 		 					$_SESSION["user_name"] = $name;
 							$_SESSION["user_password"] = $passwort[1];

					  	$info_text = 'Admin Zugangs Daten wurden geändert.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
						}
						else
						{
							$info_text = 'FEHLER: Admin Zugangs Daten wurden nur teilweise geändert.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
						}
					}
					else
					{
						$info_text = 'FEHLER: Admin Zugangs Daten wurden nur teilweise geändert.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
					}

				}
				else
				{
				$info_text = 'FEHLER: Admin Zugangs Daten nicht geändert.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
				}

			}
			else
			{
				$info_text = 'Passwörter stimmen nicht überein.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
			}
		}
		else
		{
			$info_text = 'FEHLER: Keine Volständigen angaben.<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';
		}			
		echo "<meta http-equiv='refresh' content='5;URL=admin.php'>";
		$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php'>";
		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;
	}
	elseif ($gb_aendern)
	{
		$gaestebuch_titel = stripslashes(htmlspecialchars($_POST['gaestebuch_titel']));
		$gaestebuch_titel = mysql_real_escape_string ($gaestebuch_titel);
		$pro_seite = round($_POST['pro_seite']);
		$smilies = $_POST['smilies'];
		$bbcode = $_POST['bbcode'];
		$email_senden = $_POST['email_senden'];
		$email_gast_senden = $_POST['email_gast_senden'];
		$beitrag_titel = $_POST['beitrag_titel'];
		$beitrag_icq = $_POST['beitrag_icq'];
		$captcha_code = $_POST['captcha'];
		$floodingschutz = round($_POST['floodingschutz']);
		$kommentar_titel = stripslashes(htmlspecialchars($_POST['kommentar_titel']));
		$kommentar_titel = mysql_real_escape_string ($kommentar_titel);
		$auto_beitrag_status = $_POST['auto_beitrag_status'];
		if ($pro_seite)
		{
				$eintrag = "UPDATE ".$dbsql."config Set aksion = '$pro_seite' WHERE name = 'pro_seite'";
				$eintrag = mysql_query($eintrag);
		}
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$gaestebuch_titel' WHERE name = 'gaestebuch_titel'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$email_senden' WHERE name = 'email_senden'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$smilies' WHERE name = 'smilies'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$bbcode' WHERE name = 'bbcode'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$captcha_code' WHERE name = 'captcha'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$floodingschutz' WHERE name = 'floodingschutz'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$kommentar_titel' WHERE name = 'kommentar_titel'";
		$eintrage = mysql_query($eintrag);
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$email_gast_senden' WHERE name = 'email_gast'";
		$eintrage = mysql_query($eintrag);	
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$beitrag_titel' WHERE name = 'beitrag_titel'";
		$eintrage = mysql_query($eintrag);	
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$beitrag_icq' WHERE name = 'beitrag_icq'";
		$eintrage = mysql_query($eintrag);	
		$eintrag = "UPDATE ".$dbsql."config Set aksion = '$auto_beitrag_status' WHERE name = 'auto_beitrag_status'";
		$eintrage = mysql_query($eintrag);		
		$info_text = '!!! Einstellungen geändert !!!<br /><a href="admin.php">Klick hier</a>, um zum Admin Übersicht zurückzukehren.';	
		$info_text .= "<meta http-equiv='refresh' content='5;URL=admin.php'>";
		$box_1 = style("index_body", "box_1");
		$info_text .= '<br />Sie werden in 5 Sekunden automatisch weitergeleitet.';
		$box_1 = ereg_replace("{titel}", "Information", $box_1);
		$box_1 = ereg_replace("{text}", $info_text, $box_1);
		echo $box_1;
	}
	else
	{
		$admin_body = style('admin_body','admin_body');
		$admin_body = ereg_replace("{gaestebuch_titel}", $config['gaestebuch_titel'], $admin_body);
		$admin_body  = ereg_replace("{name}", $config['admin_name'], $admin_body);
		$admin_body  = ereg_replace("{email}", $config['admin_email'] , $admin_body);
		$admin_body = ereg_replace("{pro_seite}", $config['pro_seite'], $admin_body);
		$admin_body = ereg_replace("{floodingschutz}", $config['floodingschutz'], $admin_body);
		$admin_body = ereg_replace("{kommentar_titel}", $config['kommentar_titel'], $admin_body);
	if ($config['email_senden'])
	{
		$admin_body = ereg_replace("{email_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{email_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{email_an}", "", $admin_body);
		$admin_body = ereg_replace("{email_aus}", "selected", $admin_body);
	}
	
	if ($config['email_gast'])
	{
		$admin_body = ereg_replace("{email_gast_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{email_gast_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{email_gast_an}", "", $admin_body);
		$admin_body = ereg_replace("{email_gast_aus}", "selected", $admin_body);
	}
	if ($config['beitrag_titel'])
	{
		$admin_body = ereg_replace("{beitrag_titel_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{beitrag_titel_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{beitrag_titel_an}", "", $admin_body);
		$admin_body = ereg_replace("{beitrag_titel_aus}", "selected", $admin_body);
	}
	if ($config['beitrag_icq'])
	{
		$admin_body = ereg_replace("{beitrag_icq_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{beitrag_icq_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{beitrag_icq_an}", "", $admin_body);
		$admin_body = ereg_replace("{beitrag_icq_aus}", "selected", $admin_body);
	}
	if ($config['bbcode'])
	{
		$admin_body = ereg_replace("{bbcode_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{bbcode_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{bbcode_an}", "", $admin_body);
		$admin_body = ereg_replace("{bbcode_aus}", "selected", $admin_body);
	}
	if ($config['smilies'])
	{
		$admin_body = ereg_replace("{smilies_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{smilies_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{smilies_an}", "", $admin_body);
		$admin_body = ereg_replace("{smilies_aus}", "selected", $admin_body);
	}

	if ($config['captcha'])
	{
		$admin_body = ereg_replace("{captcha_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{captcha_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{captcha_an}", "", $admin_body);
		$admin_body = ereg_replace("{captcha_aus}", "selected", $admin_body);
	}
	if ($config['auto_beitrag_status'])
	{
		$admin_body = ereg_replace("{auto_beitrag_status_an}", "selected", $admin_body);
		$admin_body = ereg_replace("{auto_beitrag_status_aus}", "", $admin_body);
	}
	else
	{
		$admin_body = ereg_replace("{auto_beitrag_status_an}", "", $admin_body);
		$admin_body = ereg_replace("{auto_beitrag_status_aus}", "selected", $admin_body);
	}
	echo $admin_body;
	}
}
}
else
{
	$login_body = style('admin_body','login_body');
	echo $login_body;
}
}
$footer = style('index_body','footer');
echo $footer;
mysql_close($verbindung);
exit;
?>