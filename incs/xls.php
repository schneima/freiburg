<?php
header("Content-type: application/vnd-ms-excel; name=Termine.xls");
header("Content-Disposition: attachment; filename=Termine.xls");
include("../content/termine.php");
?>