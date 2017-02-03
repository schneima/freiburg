<?php
$isLocal = false;

$ip = $_SERVER['REMOTE_ADDR'];
if($ip === "127.0.0.1")
{
    $isLocal = true;
}
?>