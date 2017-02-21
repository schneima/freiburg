<?php

/*
 * d - 01 bis 31, D - Mon bis Sun
 * w - 0 (für Sonntag) bis 6 (für Samstag)
 * z - 0 bis 365
 * F - January bis December, m - 01 bis 12, M - Jan bis Dec, t - Anzahl der Tage des angegebenen Monats 28 bis 31
 * W - Woche im Jahr
 * Y - Vierstellige Jahreszahl, y - Jahreszahl, zweistellig 99 oder 03
 * g - Stunde 1 bis 12, G - Stunde 0 - 23
 * h - Stunde 01 - 12, H - 00 - 23
 * i - Minuten 00-59, s - Sekunden 00-59
 *  */

class Utils
{
    static function GetDayFromTS($ts){ return date("d", $ts); }
    static function GetMonthFromTS($ts){return date("m", $ts); }
    static function GetYearFromTS($ts){ return date("Y", $ts); }

    static function GetHourFromTS($ts){ return date("H", $ts); }
    static function GetMinuteFromTS($ts){ return date("i", $ts); }
    static function GetSecondFromTS($ts){ return date("s", $ts); }
    
    static function GetFormatDateFromTS($ts){ return date("d.m.Y", $ts); }
    static function GetFormatTimeFromTS($ts){ return date("H:i:s", $ts); }
    static function GetFormatDateTimeFromTS($ts){ return date("d.m.Y H:i:s", $ts); }
    
    static function PrintMessage($message)
    {
        echo "<p class=\"message\">$message</p>";
    }

    /*
     * Returns size of given file in MegaBytes as string inclunding MB suffix
     */
    static function GetFileSizeMB($datei){

        //Grundfunktion Bytes
        $size = filesize($datei);

        //Ausgabe in MB
        $size_in_mb = $size/1024/1024;

        return number_format($size_in_mb,2)." MB";
    }    
    
    static function PrintFiles($files, $folder)
    {
        PrintFilesTargetSet($files, $folder, false);
    }
    
    /*
     * Prints $files in given $folder as unsorted list as link including file size information.
     */
    static function PrintFilesTargetSet($files, $folder, $newWindowLink)
    {
        $linkTarget= "_self";
        if ($newWindowLink)
        {
            $linkTarget="_blank";
        }
        
        echo"<ul>";
        foreach ($files as $name) {
            $fullPath = join(DIRECTORY_SEPARATOR, array($folder, $name));
            $size = Utils::GetFileSizeMB($fullPath);
            echo" <li>";
            echo"<a "
            . "href=\"".$fullPath."\""
                    ."target=\"".$linkTarget."\""
                    ." >$name ($size)</a>";
            echo"</li>";    
        }
        echo"</ul>";
    }
    
    /*
     * gibt natsort sortierte liste von $filetype dateien in $folder zurück
     */
    static function ReadFilesInFolder($folder, $filetype){
        $i = 0;
        $files = array();

        $folderHandle = opendir($folder);
        if ($folderHandle) {
            while (false !== ($file = readdir($folderHandle))) {
                $bIsZIP = (strpos($file,$filetype) > 0);
                if ($file != "." && $file != ".." && $bIsZIP) {
                    $files[$file] = $file;
                    //echo "i $i file $file ".count($files)."<br>";

                    $i++;
                }
            }
            closedir($folderHandle);
        }

        natsort($files);
        
        return $files;
    }  
    
 static function GetDaysByWeek($week, $year)
 {
     $weekdays = array();
     $daydiff = (24 * 60 * 60);;
     $start = strtotime($year."W".$week);
     $montag = $start;
     $dienstag = $montag + $daydiff;
     $mittwoch = $dienstag + $daydiff;
     $donnerstag = $mittwoch + $daydiff;
     $freitag = $donnerstag + $daydiff;
     $samstag = $freitag + $daydiff;
     $sonntag = $samstag + $daydiff;
     
     $weekdays[0] = $montag;
     $weekdays[1] = $dienstag;
     $weekdays[2] = $mittwoch;
     $weekdays[3] = $donnerstag;
     $weekdays[4] = $freitag;
     $weekdays[5] = $samstag;
     $weekdays[6] = $sonntag;
     
     return $weekdays;
 }
 
    static function DBG_Message($s)
    {
        if (DEBUG)
        {
            echo "<span class=\"debug\">$s</span><br>";
        }
    }

    static function CalculateWeekSpan($week, $year)
    {
        $startendts = array();
        $weekdiff = (7 * 24 * 60 * 60);

        // Monday based
        $start = strtotime($year."W".$week);
        

        $end = $start + $weekdiff;
        
        // for debugging purpose
        $s = Utils::GetFormatDateFromTS($start);
        $e = Utils::GetFormatDateFromTS($end);
        
        $startendts[0] = $start;
        $startendts[1] = $end;
        
        return $startendts;
    }

    
    static function GetPdfPreview($fileName)
    {
        $fileName = realpath($fileName);
        echo "filename: $fileName";
        $im = new imagick( $fileName);
        $im->setImageFormat('jpg');
        header('Content-Type: image/jpeg');
        echo $im;        
    }
    
    }


?>
