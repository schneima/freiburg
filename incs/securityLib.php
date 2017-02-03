<?php
session_start();

$bLoggedIn = false;
$arPw[] = null;
$statusVariableName='user_status';
$userNameVarialbe='bn';

$handle = fopen("requirements/statlog.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
{
    $arPw[$data[0]] = $data[1];
}
fclose($handle);

$pwMusiker = $arPw['musiker'];
$pwAdmin = $arPw['admin'];

if(isset($_SESSION[$statusVariableName]))
{
	$bLoggedIn = $_SESSION[$statusVariableName];
    if($bLoggedIn){
		$bn = $_SESSION[$userNameVarialbe];
		$imgOnline = "led_green.png";
		$lbOnline = "angemeldet";
		$message = "<br />";
	}else
	{
		$imgOnline = "led_red.png";
		$lbOnline = "abgemeldet";
		$message = "<br />";
		$bn = "";
	}
  }else{
   
    $bLoggedIn = false;
	$imgOnline = "led_red.png";
	$lbOnline = "offline";
	$message = "<br />";
}

if(isset($_POST['login'])){
	if(!empty($_POST[$userNameVarialbe]) && !empty($_POST['pw'])){
        $bn = $_POST[$userNameVarialbe];
		$pwIn = $_POST['pw'];	
		switch($bn)
		{
			case "musiker":
				$pw = $pwMusiker; // .date("d"); // war zu kompliziert
				if($pwIn==$pw){
					$bLoggedIn = true;
                    $imgOnline = "led_green.png";
                    $lbOnline = "angemeldet";     
				}
				else{
					$bLoggedIn = false;
					$message = "falsches Passwort!";
                    $imgOnline = "led_red.png";
                    $lbOnline = "abgemeldet";
				}
			break;
			case "admin": 
				$pw = $pwAdmin.date("d");
				if($pwIn==$pw){
					$bLoggedIn = true;
                    $imgOnline = "led_green.png";
                    $lbOnline = "angemeldet";
				}
				else{
					$bLoggedIn = false;
					$message = "falsches Passwort!";
                    $imgOnline = "led_red.png";
                    $lbOnline = "abgemeldet";
				}
			break;
			default:
				$message = "unbekannter Benutzer!";
		}

        if($bLoggedIn) 
        {
            $_SESSION[$statusVariableName] = true;
            $_SESSION[$userNameVarialbe] = $bn;
        }   
	}
	else{
		$message = "Kein BN oder PW angegeben!";
	}
}

else if(isset($_GET['logout']))
{
	$_SESSION['user_status'] = false;
	$bLoggedIn = false;
	$message = "ausgelogged!";
    $imgOnline = "led_red.png";
    $lbOnline = "abgemeldet";
    session_destroy();
}

if($bLoggedIn){
    $logoutBtn = "<a href=\"?content=login&logout=1\"> Abmelden </a>";
}  else {
    $logoutBtn = "";
}

function getGermanMonth($month)
{
	$value = "";
	switch($month)
	{
		case 1:
			$value = "Januar";
			break;
		case 2:
			$value = "Februar";
			break;
		case 3:
			$value = "M&auml;rz";
			break;
		case 4:
			$value = "April";
			break;
		case 5:
			$value = "Mai";
			break;
		case 6:
			$value = "Juni";
			break;
		case 7:
			$value = "Juli";
			break;
		case 8:
			$value = "August";
			break;
		case 9:
			$value = "September";
			break;
		case 10:
			$value = "Oktober";
			break;
		case 11:
			$value = "November";
			break;
		case 12:
			$value = "Dezember";
			break;
		
	}
	return $value;
}

?>