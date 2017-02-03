<?php
//$pdfFileName = $_GET['filename'];
//$im = new imagick('$pdfFileName[0]');
//$im->setImageFormat('jpg');
//header('Content-Type: image/jpeg');
//echo $im;



?>


<?php

header('Content-type: image/jpeg');

$image = new Imagick('image.jpg');

// If 0 is provided as a width or height parameter,
// aspect ratio is maintained
$image->thumbnailImage(100, 0);

echo $image;

?>