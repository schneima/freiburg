<?php

define("DEBUG", 0);

$folder = "./content/news/";

    function DBG_Message($s)
    {
        if (DEBUG)
        {
            echo "<span class=\"debug\">$s</span><br>";
        }
    }

$headline = "Aktuelles";
$news = true;

if (isset($_GET['f']))
{
    switch ($_GET['f'])
    {
        case "archiv":
            $folder = "./content/archiv/";
            $headline = "Archiv";
            $news = false;
            break;
        case "news":
            $folder = "./content/news/";
            $headline = "Aktuelles / Termine";
            break;
        default:
            $folder = "./content/news/";
            $headline = "Aktuelles / Termine";
            break;
    }
}

echo"<h1>$headline</h1>";

readFolder($folder, $news);

    function readFolder($folder, $news){
        
        $filter = array ("html", "htm", "php");
        $i = 0;
        if ($handle = opendir($folder)) {
            while (false !== ($file = readdir($handle))) {
                $fileNameArray = explode( ".", $file );
                $extension = end($fileNameArray);
                $number = $fileNameArray[0];
                $isInArray = in_array( $extension, $filter );

                if ($file != "." && $file != ".." && ( in_array( $extension, $filter ) )) {
                    $files[$file]['file'] = $file;
                    $files[$file]['format'] = $extension;
                    $files[$file]['number'] = $number;
                    $i++;
                }
            }
            closedir($handle);
        }
       
        function IsSubPageNumber($pageNumber) {
            return strpos($pageNumber, "_");
        }

        function GetMainPageNumber(string $number)
        {
            $parts = explode("_", $number);
            return $parts[0];
        }

        function cmp_by_optionNumber($a, $b)
        {
            if(!is_numeric($a['number'])){
                // a is subpage
                return 1;
                DBG_Message('Invalid number');
                DBG_Message("file: ".$a['file']);
                DBG_Message("number: ".$a['number']);
            }
            if(!is_numeric($b['number'])){
                // b is subpage
                return -1;
            }

            $value = $b["number"] - $a["number"];
            return $value;
        }
        
        usort($files, 'cmp_by_optionNumber');

        foreach ($files as $file) {
            $absFile = $folder.$file['file'];

            if(!$news)
            {
                echo"<div align=\"right\">".$file['number']."</div>";
            }
            include($absFile);
        }
    }
?>
