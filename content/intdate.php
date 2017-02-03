<?php
require_once('incs/admin_lib.php');
printNewDateForm();
if(isset($_POST['terminTs'])&&isset($_POST['terminTs'])&&isset($_POST['terminTs'])&&isset($_POST['terminTs']))
{
	echo "<br />terminTs. ".$_POST['terminTs'];
	echo "<br />terminWas: ".$_POST['terminWas'];
	echo "<br />terminSicht: ".$_POST['terminSicht'];
	echo "<br />terminTreffpunkt: ".$_POST['terminTreffpunkt'];
	
}

?>