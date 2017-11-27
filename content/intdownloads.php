<?php
require_once './incs/utils.class.php';

if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}

$folder = "./Downloads/";
$title="Herbstkonzert 2017";
    echo"
        <h2>$title</h2>";
    
    
    
     $filetype = ".zip";
    //$zipFiles = readFilesInFolder($folder, );
    $zipFiles = Utils::ReadFilesInFolder($folder, $filetype);
    if(count($zipFiles)>0)
    {
        echo "alle Datein als ZIP-Datei downloaden:<br />";
    
        // print zip links
        Utils::PrintFiles($zipFiles, $folder);
    }
    
    // echo"Programm downloaden:";
    // $pdfFiles = readFilesInFolder($folder, ".pdf");
        // print zip link
    //printFiles($pdfFiles, $folder);
    
        echo"<br><table>
            <tr class=\"tableHeader\" >
                    <td width=\"350px\">St&uuml;ck</td><td width=\"400px\">Datei</td><td width=\"70px\">MB</td>
            </tr>";
        readMp3Folder($folder);

    echo "</table>";
    
    
    /* ################################ */
    /*   Funktionen                     */
    /* ################################ */
        
    function readMp3Folder($folder){
        $i = 0;
        $files = array();
        /* datei array einlesen */
        if ($handle = opendir($folder)) {
            while (false !== ($file = readdir($handle))) {
                $bIsMp3 = (strpos($file,".mp3") > 0);
                if ($file != "." && $file != ".." && $bIsMp3) {
                    $files[$file] = $file;
                    //echo "i $i file $file ".count($files)."<br>";

                    $i++;
                }
            }
            closedir($handle);
        }

        natsort($files); //, SORT_STRING);

        /* für jeden Eintrag reihe abbilden*/
        foreach ($files as $curFile => $value) {
                    printRow($folder, $value);
        }
    }
    
    function printRow($folder, $datei){
        // bindestrich suchen
        // legacy php5 stripos!!!
        $dashindex = strpos($datei, "-");
        $underindex = strpos($datei, "_");
        $von = 0;
        $bis = strlen($datei)-4;
        /*
        if($underindex >= 0 && $underindex != false){
            $von = $underindex+1;
        }
        
        // falls ohne dash, dann bis wortlänge minus 3 (.mp3)
        if($dashindex >= 0 && $dashindex != false){ 
                $bis = $dashindex;
            }else{
                $bis = strlen($datei)-4;
        }
        */
        
        $name = substr($datei, $von, $bis-$von);
        // falls immer noch underlines im name, durch whitespaces ersetzen
        $name = str_replace("_", " ", $name);
        echo"<tr>
                    <td>$name</td><td><a id=\"fileNames\" target=\"_blank\" href=\"$folder$datei\">$datei</a></td><td>".Utils::GetFileSizeMB($folder.$datei)."</td>
            </tr>";
    }

?>