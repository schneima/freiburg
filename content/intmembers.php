<?php
if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}
require_once('incs/db_conn.php');
if(isset($_GET['action']))
{
	$action = $_GET['action'];
}else{
	$action = "";
}

if($bn=="musiker"){

	$sqlQuery = " SELECT `name`, `vorname`, `instrument` FROM `mvbmusiker` WHERE `status` = 1;"; 	
	$sqlResult = mysql_query($sqlQuery) or die('Probleme mit der Datenbank!');
	echo"<table>
		<tr class=\"tableHeader\">
			<td>Name</td><td>Instrument</td>
		</tr>";

	while($row = mysql_fetch_array($sqlResult)) 
	{
		$name = $row['name'];
		$vorname = $row['vorname'];
		$namevoll = $name." ".$vorname;

		$instrument = $row['instrument'];
		
		echo"
			<tr>
				<td>".$namevoll."</td><td>".$instrument."</td>
			</tr>";	
	}
	echo "</table>";
}
if($bn=="admin")
{
	if($action=="edit")
	{
		echo"<form action=\"\">
		";
		$id=$_GET['id'];
		getEditFields($id);
		echo"<input type=\"submit\" value=\"speichern\" /> </form>";

	
	
	}else{
		$sqlQuery = " SELECT * FROM `mvbmusiker` WHERE `status` = 1;"; 	
		$sqlResult = mysql_query($sqlQuery) or die('Probleme mit der Datenbank!');
		echo"<table>
			<tr>
				<td>Id</td><td>Name</td><td>Instrument</td>
			</tr>";
	
		while($row = mysql_fetch_array($sqlResult)) 
		{
			$name = $row['name'];
			$vorname = $row['vorname'];
			$namevoll = $name." ".$vorname;
	
			$instrument = $row['instrument'];
			
			echo"
				<tr>
					<td><a href=\"?content=intmembers&action=edit&id=".$row['id']."\" >".$row['id']."</a></td><td>".$namevoll."</td><td>".$instrument."</td>
				</tr>";	
		}
		echo "</table>";
	}
}

function getEditFields($id)
{
		$sqlQuery = " SELECT * FROM `mvbmusiker` WHERE `id` = ".$id.";"; 	
		$sqlResult = mysql_query($sqlQuery);
		$row = mysql_fetch_row($sqlResult);		
		foreach ($row as $key => $value) 
		{
			echo $key.": <input type=\"text\" name=\"".$key."\" value=\"".$value."\"> <br />";
		}
}


?>