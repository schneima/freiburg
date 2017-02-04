<?php
$isLocal = false;
$serverName = $_SERVER['SERVER_NAME'];
if($serverName === "localhost")
{
    $isLocal = true;
}
?>