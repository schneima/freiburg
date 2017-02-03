<?php
if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}
	include('incs/db_conn.php');

	$sqlQuery = " SELECT `name`, `vorname`, `geburtstag` FROM `mvbmusiker` WHERE `status` = 1 ORDER BY MONTH(`geburtstag`), DAY(`geburtstag`);"; 	
	$sqlResult = mysql_query($sqlQuery) or die('Probleme mit der Datenbank!');
	echo"<table>
		<tr class=\"tableHeader\">
			<td width=\"200px\">Name</td><td width=\"130px\">Geburtstag</td><td width=\"150px\">Alter</td>
		</tr>";

	while($row = mysql_fetch_array($sqlResult)) 
	{
		$name = $row['name'];
		$vorname = $row['vorname'];
		$namevoll = $name." ".$vorname;

		$sqlGeburtstag = $row['geburtstag'];
		$arGeburtstag = split("-",$sqlGeburtstag);
		
		$tag = $arGeburtstag[2];
		$monat = $arGeburtstag[1];
		$jahr = $arGeburtstag[0];
		$geburtstag = $tag.".".$monat.".".$jahr;

		$jetzt = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$geburt = mktime(0,0,0,$monat,$tag,$jahr);
		$alter = intval(($jetzt - $geburt) / (3600 * 24 * 365));		
		
		echo"
			<tr>
				<td>".$namevoll."</td><td>".$geburtstag."</td><td>".$alter."</td>
			</tr>";	
	}
	echo "</table>";


?>