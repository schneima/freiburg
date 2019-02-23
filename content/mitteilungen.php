<?php
require_once './incs/utils.class.php';

$folder = "content/mitteilungen";
//$folder = "../";
$title="Vereinsmitteilungen";
echo"<h2>$title</h2>";    

$filetype = ".pdf";
          
$filesToPrint = Utils::ReadFilesInFolder($folder, $filetype);
$fileCount=count($filesToPrint);

if($fileCount > 0)
{
    echo "Bisher erschienene Vereinsmittleiungen:<br />";
    foreach ($filesToPrint as $file) {
        $fullPath = join(DIRECTORY_SEPARATOR, array($folder, $file));        
        echo "<p class=\"center\">";
        
        $fileNameNoExt = substr($file, 0, strlen($file)-4);
        $imageFileName = $fileNameNoExt."_preview.jpg";
        $src="$folder/$imageFileName";
            
        echo "";
        echo"<a "
            ."href=\"".$fullPath."\""
            ."target=\"_blank\""
            ." >"
                . "<img class=\"verticalcentered\" src=\"$src\" alt=\"PDF Preview $file\"/><br>"
                . " $file </a><br><br>";
        echo "</p>";
    }
}

?>