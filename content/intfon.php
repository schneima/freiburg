<?php
if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}
	include('incs/db_conn.php');

	$sqlQuery = " SELECT `name`, `vorname`, `telefon_privat`, `handy`, `mail` FROM `mvbmusiker` WHERE `status` = 1 ORDER BY `name`;"; 	
	$sqlResult = mysql_query($sqlQuery) or die('Probleme mit der Datenbank!');
	echo"<table>
		<tr class=\"tableHeader\">
			<td width=\"200px\">Name</td><td width=\"130px\">Privat</td><td width=\"150px\">Handy</td><td>Mail</td>	
		</tr>";

	while($row = mysql_fetch_array($sqlResult)) 
	{
		$name = $row['name'];
		$vorname = $row['vorname'];
		$namevoll = $name." ".$vorname;
		$telPriv = $row['telefon_privat'];
		$telHandy = $row['handy'];
		$mail = $row['mail'];

		echo"
			<tr>
				<td>".$namevoll."</td><td>".$telPriv."</td><td>".$telHandy."</td><td><a href=\"mailto:".$mail."\">".$mail."</a></td>
			</tr>";	
	}
	echo "</table>";

?>