<div id="geburstage">
    <strong>n&auml;chste Geburstage</strong>
<?php
	include('incs/db_conn.php');

// is true if could connect to DB
if(SQLCONN)
{
    echo "is set";
	$sqlQuery = " SELECT `name`, `vorname`, `geburtstag` FROM `mvbmusiker` WHERE `status` = 1 ORDER BY month(`geburtstag`) , day(`geburtstag`);"; 	
	$sqlResult = mysql_query($sqlQuery) or die('Probleme mit der Datenbank!');
	
	// zähler für die anzahl von treffer
	$i = 0;
	// setz initale werte für alten datensatz
	$altMonat = "";
	$altTag = "";
	echo"<table class=\"gebNames\">";
	while($row = mysql_fetch_array($sqlResult)) 
	{
		$name = substr($row['name'], 0, 1).".";
		$vorname = $row['vorname'];
		$tag = substr($row['geburtstag'], 8, 2);
		$monat = substr($row['geburtstag'], 5, 2);
		$gebJahr = substr($row['geburtstag'], 0, 4);

		$usefulDate = $tag.".".$monat.".".$gebJahr;
		//echo "act satz: ".$name." ".$vorname." ".$usefulDate."<br />";
		
		// gibt nur die ersten fünf aus, falls mehr..., aber bei gleichen geburstage anzeigen

		if(isNextBirthday($tag, $monat) == true && ($i<5) || (($altMonat == $monat) && ($altTag == $tag)))
		{
			echo "<tr><td >".$vorname." ".$name."</td><td>".$usefulDate."</td></tr>";	
			$i++;
			$altMonat = $monat;
			$altTag = $tag;
		}
	}
	echo"</table>";	
}else{
    echo "<p>Konnte keine Geburtstage finden.</p>";
    
}

	function isNextBirthday($tag, $monat)
	{
		$aktJahr = date("Y");
		$gebDate = strtotime($aktJahr."-".$monat."-".$tag);
		$nextYear = $aktJahr + 1;
		$gebDateNextYear = strtotime($nextYear."-".$monat."-".$tag);
		$differenz = $gebDate - strtotime(date('Y-m-d'));
		/* todo
		// differenz f�r jahreswechsel
		if(($monat=="01") || ($monat="02"))
		{
			$differenz = $gebDateNextYear - strtotime(date('Y-m-d'));
			$diff = $differenz/60/60/24;
			if(($diff > 0) && ($diff < 40))
			{
				return true;
			}else{
				return false;
			}
		}*/
		
		// diff in monaten f�r aktuelles jahr
		$diff = $differenz/60/60/24;
		if(($diff > 0) && ($diff < 40))
		{
			return true;
		}else{
			return false;
		}
	}
	
?>
</div>