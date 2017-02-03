<?php
require_once './incs/utils.class.php';

$folder = "./content/mitteilungen";
//$folder = "../";
$title="Vereinsmitteilungen";
echo"<h2>$title</h2>";    

$filetype = ".pdf";
          
$zipFiles = Utils::ReadFilesInFolder($folder, $filetype);
$fileCount=count($zipFiles);

if($fileCount > 0)
{
    echo "Bisher erschienene Vereinsmittleiungen:<br />";

    // print zip links
    Utils::PrintFiles($zipFiles, $folder);
}