
<h1>Presseberichte</h1>

<table>

    <tr class="tableHeader" >
        <td width="100px">Datum</td><td width="450px">Titel</td><td width="70px">Format</td><td>Download</td>
    </tr>

<?php

$folder = "./berichte/";

readFolder($folder);



        function readFolder($folder){
            $i = 0;
            if ($handle = opendir($folder)) {
                while (false !== ($file = readdir($handle))) {
                    $sFormat = substr($file, -3);
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $isPdf = $ext == "pdf";
                    $isJpg = $ext == "jpg";
                    
                    //echo "$file ext: ".$ext."<br>";
                    $isValid = $isPdf || $isJpg;
                    if ($file != "." && $file != ".." && $isValid) {
                        $files[$file]['file'] = $file;
                        $files[$file]['format'] = $sFormat;
                        // datum von dateinamen trennen
                        $iUscore = strpos($file, "_");
                        $datum = substr($file, 0, $iUscore);
                        $files[$file]['name'] = substr($file, $iUscore+1,-4); // dateinamen ohne endung
                        $files[$file]['datum'] = $datum; // (umgekehrtes) yyyy.mm.dd datum
                        // echo "i $i file $file ".count($files)."<br>";
                        $i++;
                    }
                }
                closedir($handle);
            }

            rsort($files); //, SORT_STRING);
            
            //echo "$i anz: ".count($files)."<br>";
            
            foreach ($files as $file) {
                printRow($folder, $file);                
            }
        } 

        function printRow($folder, $datei){
            $absFile = $folder.$datei['file'];
            $fileMB = getFileSizeMB($absFile);
            $jahr = substr($datei['datum'],0,4);
            $monat = substr($datei['datum'],5,2);
            $tag = substr($datei['datum'],8,2);
            echo"<tr>
                    <td>$tag.$monat.$jahr</td><td>".$datei['name']."</td><td>".strtoupper($datei['format'])."</td><td><a target=\"blank\" href=\"$absFile\">Link</a> (".$fileMB.")</td>
		</tr>";
        }

        
        function getFileSizeMB($datei){

            //Grundfunktion Bytes
            $size = filesize($datei);
            //Ausgabe in KB
            $size_in_kb = $size/1024;

            //Ausgabe in MB
            $size_in_mb = $size/1024/1024;

            return number_format($size_in_mb,2)." MB";
        }

?>

</table>