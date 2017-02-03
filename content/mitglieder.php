<?php

$f = null;
$message = null;
$logoutBtn="<form onMouseOver=\"\" action=\"?content=members\" method=\"post\">
		<input name=\"logout\" type=\"submit\" value=\".: Logout :.\" onClick=\"\"></form>";
//	db Verbindung
include('incs/db_conn.php');
//	checks user status, sets local boolean
if(isset($_SESSION['user_status']))
{
	$bLoggedIn = $_SESSION['user_status'];
	if($bLoggedIn){
		$bn = $_SESSION['bn'];
	}
}
else
{
	$bLoggedIn = false;
}

//	checks and sets user status after form was submitted
//	if not submitted print form
if(isset($_POST['login'])){
	if(!empty($_POST['bn']) && !empty($_POST['pw'])){
		$bn = $_POST['bn'];
		$pwIn = $_POST['pw'];	
		switch($bn)
		{
			case "musiker":
				$_SESSION['bn']="musiker";
				$pw = "bollschweil".date("d");
				if($pwIn==$pw){
					$_SESSION['user_status'] = true;
					echo $logoutBtn;
					printAllDates();
				}
				else{
					wrongDetails();
				}
			break;
			case "admin": 
				$_SESSION['bn']="admin";
				if($pwIn=="verdammtesi"){
					$_SESSION['user_status'] = true;
					echo $logoutBtn;
					printLoginForm();
					printNewDateForm();
					printAllDates();
				}
				else{
					wrongDetails();
				}
			break;
			default:
				wrongDetails();
			}
	}
	else{
		echo "Kein BN oder PW angegeben!";
		printLoginForm();
	}
}
//	updates user status to offline
else if(isset($_POST['logout']))
{
	$_SESSION['user_status'] = false;
	echo"ausgelogged!";
	printLoginForm(false);
}

else{
	if($bLoggedIn)
	{
			echo $logoutBtn;
			switch($bn)
		{
			case "musiker":
					printAllDates();
			break;
			case "admin": 
				echo"
				<script type=\"text/javascript\">
				var bas_cal,dp_cal,ms_cal;      
				window.onload = function () {
					dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('epoch_calender_input'));
				};
				</script>";
				echo"<a href=\"?content=members&action=read\" >anzeigen</a>";
				printNewDateForm();
				//	neuen Termin eintragen
				if(isset($_GET['action']) && ($_GET['action']=='insert'))
				{	
					$terminTs = $_POST['terminTs'];
					$terminWas = $_POST['terminWas'];
					$terminSicht = $_POST['terminSicht'];
					$actualDate = mktime();
					$tstreffpunkt = $_POST['terminTreffpunkt'];
					if(storeNewDate($actualDate, $tstreffpunkt, $terminWas, $terminSicht))
					{
						echo"eingetragen";
					}else{
						echo"Fehler beim Eintragen";				
					}
				}
				//	Termin löschen
				else if(isset($_GET['action']) && ($_GET['action']=='delete'))
				{
					//	id wird mit *157 übertragen
					$id=(($_GET['id'])/157);
					if(deleteDate($id))
					{
						echo"gelöscht";
					}else{
						echo"Fehler beim Löschen";				
					}		
				}
				else if(isset($_GET['action']) && ($_GET['action']=='read'))
				{
					$file='musiker.csv';
					$Dateizeiger = fopen($file, "r");
					while(($Daten = fgetcsv($Dateizeiger, 1000, ";")) !== FALSE)
					{
//Status	Anr.	Nachname	Vorname	Straße	PLZ	Ort	Geb.datum	Telefon privat	Geschätlich	Handy	E-Mail	Instrument	Aktiv seit
//	0		1			2			3		4	  5  6		7			8				9		 10		  11		12			13
						$gebDatum= getSQLDate($Daten[7]);
						$mitSeit = getSQLDate($Daten[13]);
						if($Daten[0]=="A"){$status = 1;}
						elseif($Daten[0]=="Z"){$status = 2;}
						else{$status = 99;}
						
						$sqlQuery="INSERT INTO `home`.`mvbmusiker` (`id` ,`name`,`vorname`,`strasse`,`plz`,`ort`,`telefon_privat`,`telefon_gesch`,`handy`,`mail`,`instrument`,`geburtstag`,`mseit`,`status`,`anrede`)
	VALUES ( NULL, '".$Daten[2]."', '".$Daten[3]."', '".$Daten[4]."', '".$Daten[5]."', '".$Daten[6]."', '".$Daten[8]."', '".$Daten[9]."', '".$Daten[10]."', '".$Daten[11]."', '".$Daten[12]."', '".$gebDatum."', '".$mitSeit."', '".$status."', '".$Daten[1]."');";
						//echo $sqlQuery."<br />";
						//mysql_query($sqlQuery) or die('MySql Error');
					}
					fclose($Dateizeiger);
				}
				printAllDates();
		
		
		
			break;
			default:
				wrongDetails();
			}

	

	}else{
		printLoginForm();
	}
}












?>
