<?php
$fileName = "incs/people.txt";
$xmlString = file_get_contents($fileName);
$xml = new SimpleXMLElement($xmlString);

foreach ($xml->tr as $row) {
   echo $row->td[0], '<br />';
}

?>