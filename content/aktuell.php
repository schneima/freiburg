<?php
/*
 * automatisches Auslesen des News-Verzeichnis
 */
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
                // Prepare file extension
                $extension = end($fileNameArray); // Eg. "jpg"
                $number = $fileNameArray[0];
                DBG_Message("file: $file");
                DBG_Message("hallo");
                
                DBG_Message("number: $number");
                DBG_Message("ext: $extension");
                $isInArray = in_array( $extension, $filter );
                DBG_Message("isin aray: $isInArray");
                if ($file != "." && $file != ".." && ( in_array( $extension, $filter ) )) {
                    $files[$file]['file'] = $file;
                    $files[$file]['format'] = $extension;
                    $files[$file]['number'] = $number;
                    
                    // echo "i $i file $file ".count($files)."<br>";
                    $i++;
                }
            }
            closedir($handle);
        }
       
        
        function cmp_by_optionNumber($a, $b) 
        {
            $value = $b["number"] - $a["number"];
            DBG_Message("value: $value");
            return $value;
        }
        
        usort($files, 'cmp_by_optionNumber');
        
        //echo "$i anz: ".count($files)."<br>";

        foreach ($files as $file) {
            $absFile = $folder.$file['file'];
            DBG_Message("absfile: $absFile");
            
            if(!$news)
            {
                echo"<div align=\"right\">".$file['number']."</div>";
            }
            include($absFile);                
        }
    } 

  $testlink="<a href=\"./incs/google_cal_parser.php\">XML Parsesr</a>";
  DBG_Message($testlink);

?>
<?php 
if($news)
{
    // include('content/termine.php');
}
?>
<!--
<br><b>als <a href="incs/xls.php">Excel-File</a> exportieren</b><br><br>
-->

