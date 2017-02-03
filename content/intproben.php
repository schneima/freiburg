<?php
if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}
echo"<h1>Registerproben</h1>";
	echo"<table>
		<tr class=\"tableHeader\" >
			<td width=\"150px\">Register</td><td width=\"250px\">Datum</td><td width=\"250px\">Uhrzeit</td>	
		</tr>
		<tr class=\"tableRow\">
			<td>Horn und Trompete</td><td>11.03.2010</td><td>20 Uhr</td>	
		</tr>
		<tr class=\"tableRow\">
			<td>Alt, Tenor und Barisaxophon</td><td>18.03.2010</td><td>20 Uhr</td>	
		</tr>
		<tr class=\"tableRow\">
			<td>Klarinetten, Fl&ouml;ten, Oboe</td><td>25.03.2010</td><td>20 Uhr</td>	
		</tr>
		";

	echo "</table>";

?>