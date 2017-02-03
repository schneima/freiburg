<?php

$abfrage_config = "SELECT * FROM ".$dbsql."config";
$ergebnis_config = @mysql_query($abfrage_config) or die (mysql_error());
while($sqlconfig = @mysql_fetch_object($ergebnis_config))
{
$config["$sqlconfig->name"] = $sqlconfig->aksion;
}

$ip = $_SERVER['REMOTE_ADDR'];

if ($_SESSION["user_login"] == true)
{
	$abfrage_themen = "SELECT COUNT(*) FROM ".$dbsql."beitrag";
}
else
{
	$abfrage_themen = "SELECT COUNT(*) FROM ".$dbsql."beitrag WHERE status = '1'";
}
$ergebnis_themen = mysql_query($abfrage_themen);
$couter_beitaege = mysql_fetch_row($ergebnis_themen);

function style($datei,$template)
{
global $config;
$index_body = file_get_contents($root.'design/'.$datei.'.tpl');

$style = explode("<!-- $template -->", $index_body);
$style = explode("<!-- /$template -->", $style[1]);
$style = $style[0];

$style = ereg_replace("{gaestebuch_titel}", $config['gaestebuch_titel'], $style);
$style = ereg_replace("{version}", $config['version'], $style);
global $couter_beitaege;
$style = ereg_replace("{counter_beitraege}", "$couter_beitaege[0]", $style);

	if ($config['smilies'])
	{
		$style = ereg_replace("{smilies}", "an", $style);
	}
	else
	{
		$style = ereg_replace("{smilies}", "aus", $style);
		
		$style = ereg_replace("<!-- smilies_box -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /smilies_box -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}
	if ($config['bbcode'])
	{
		$style = ereg_replace("{bbcode}", "an", $style);
	}
	else
	{
		$style = ereg_replace("{bbcode}", "aus", $style);
		$style = ereg_replace("<!-- bbcode_box -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /bbcode_box -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}
	if ($config['beitrag_icq'] == 1)
	{

	}
	else
	{
		$style = ereg_replace("<!-- beitrag_icq_box -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /beitrag_icq_box -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}	
	if ($config['beitrag_titel'] == 1)
	{

	}
	else
	{
		$style = ereg_replace("<!-- beitrag_titel_box -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /beitrag_titel_box -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}
	
	if (!$config['captcha'])
	{
	 $style = ereg_replace("<!-- captcha -->", "[enfernen]", $style);
	 $style = ereg_replace("<!-- /captcha -->", "[/enfernen]", $style);
	 $style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}

	if ($_SESSION["user_login"])
	{
		$style = ereg_replace("<!-- admin_ausgelogt -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /admin_ausgelogt -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);	
	}
	else
	{
		$style = ereg_replace("<!-- admin_eingelogt -->", "[enfernen]", $style);
		$style = ereg_replace("<!-- /admin_eingelogt -->", "[/enfernen]", $style);
		$style = preg_replace("/\[enfernen\](.*?)\[\/enfernen\]/si", "", $style);			
	}
	
	$style = ereg_replace("{pro_seite}", $config['pro_seite'], $style);
return $style;
}


function bbcode($text)
{
	global $config;
	$text = stripslashes($text);
	$text = htmlspecialchars($text);
	
	if ($config['bbcode'])
	{
		$text = ereg_replace("www.", "http://www.", $text);
		$text = ereg_replace("http://http://www.", "http://www.", $text);
		$text = preg_replace("/\[b\](.*?)\[\/b\]/si", "<b>\\1</b>", $text); //Fett
		$text = preg_replace("/\[i\](.*?)\[\/i\]/si", "<i>\\1</i>", $text); //kussif
		$text = preg_replace("/\[u\](.*?)\[\/u\]/si", "<u>\\1</u>", $text); //unterstrichen
		$text = preg_replace("/\[img\](.*?)\[\/img\]/si", '<img src="$1" border="0" alt=""/>', $text);
		$text = preg_replace("/\[url\](.*?)\[\/url\]/si", '<a href="$1" target="_blank" title="$1">$1</a>', $text); 
		$text = preg_replace("/\[url=(.*?)\](.*?)\[\/url\]/si", '<a href="$1" title="$1" target="_blank">$2</a>', $text); 
		$text = preg_replace("/\[color=(.*?)\](.*?)\[\/color\]/si", '<font color="$1">$2</font>', $text);
		$text = preg_replace("/\[zitat\](.*?)\[\/zitat\]/si", '<b>Zitat:</b><br /><div class="zitat">$1</div>', $text); 
		$text = preg_replace("/\[code\](.*?)\[\/code\]/si", '<b>Code:</b><br /><div class="code">$1</div>', $text);
	}
	$text = preg_replace("/\[kommentar\](.*?)\[\/kommentar\]/si", '<br /><br /><b>'.$config['kommentar_titel'].':</b><br /><div class="kommentar">$1</div>', $text);

	$text = nl2br($text);
	$text = wordwrap( $text, 42, "\n", 1);
	return $text;	
}

function smilies($text)
{
	global $config;	
	if ($config['smilies'])
	{
		$text = ereg_replace(":)", '<img src="smilies/1.gif" alt=":)"/>', $text);
		$text = ereg_replace(":D", '<img src="smilies/icon_biggrin.gif" alt=":D"/>', $text);
		$text = ereg_replace(":frown:", '<img src="smilies/icon_frown.gif" alt=":frown:"/>', $text);
		$text = ereg_replace("8)", '<img src="smilies/rolleyes.gif" alt="8)"/>', $text);
		$text = ereg_replace(":idee:", '<img src="smilies/icon_idea.gif" alt=":idee:"/>', $text);
		$text = ereg_replace(";)", '<img src="smilies/icon_wink.gif" alt=";)"/>', $text);
		$text = ereg_replace(":neutral:", '<img src="smilies/icon_neutral.gif" alt=":neutral:"/>', $text);
		$text = ereg_replace(":O", '<img src="smilies/icon_surprised.gif" alt=":O"/>', $text);
		$text = ereg_replace(":S", '<img src="smilies/icon_confused.gif" alt=":S"/>', $text);
		$text = ereg_replace(":twisted:", '<img src="smilies/icon_twisted.gif" alt=":twisted:"/>', $text);
		$text = ereg_replace(":evil:", '<img src="smilies/icon_evil.gif" alt=":evil:"/>', $text);
		$text = ereg_replace(":!:", '<img src="smilies/icon_exclaim.gif" alt=":!:"/>', $text);
		$text = ereg_replace(":arrow:", '<img src="smilies/icon_arrow.gif" alt=":arrow:"/>', $text);
		$text = ereg_replace(":question:", '<img src="smilies/icon_question.gif" alt=":question:"/>', $text);
	}
return $text;
}
function homepage($homepage)
{
	$homepage = ereg_replace("www.", "http://www.", $homepage);
	$homepage = ereg_replace("http://http://www.", "http://www.", $homepage);
	return $homepage;	
}

function neu_pw($laenge)
{
	$array_neu_pw = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9");
	$count_array = count($array_neu_pw)-1;
	
	for ($pw_laenge=0;$pw_laenge < $laenge;$pw_laenge++)
	{
		$neu_zeichen = $array_neu_pw[rand(0,$count_array)];
		$neu_pw .= $neu_zeichen;		
	}
	return $neu_pw;
}
?>