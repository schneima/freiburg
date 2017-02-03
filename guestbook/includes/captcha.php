<?php
session_start();

if (!$_SESSION['captcha_code'] or $_GET['captcha'] == "bild")
{
$captcha_zahlen = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9");
$_SESSION['captcha_code'] = $captcha_zahlen[rand(0,34)];
$_SESSION['captcha_code'] .= $captcha_zahlen[rand(0,34)];
$_SESSION['captcha_code'] .= $captcha_zahlen[rand(0,34)];
$_SESSION['captcha_code'] .= $captcha_zahlen[rand(0,34)];
$_SESSION['captcha_code'] .= $captcha_zahlen[rand(0,34)];
}

$captcha_code =	 $_SESSION['captcha_code'];

if ($_GET['captcha'] == "bild")
{
header ("Content-type: image/gif");
$im = ImageCreateFromGIF ("design/images/captcha.gif");
$background_color = ImageColorAllocate ($im, 0, 0, 0);
$text_color = ImageColorAllocate ($im, 255, 255, 0);
ImageString ($im, 20, 6, 5, $captcha_code, $text_color);
Imagegif ($im);
exit;
}

?> 