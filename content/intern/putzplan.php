<h1>Putzliste</h1>
<?php
if($bLoggedIn == false)
{
    echo die("Bitte anmelden.");
}
function printCleaningTalbeForYear($startGroup)
{
    $monthToSkip=8;
    echo"<table>";
    echo"   <tr>
            <th>Monat</th><th>Register bzw.Gruppe</th>
        </tr>";

    $group = $startGroup;
    $maxGroup=8;
    setlocale(LC_TIME, "de_DE.UTF-8");
    for($i=1; $i <= 12; $i++)
    {
        $toPrint = "";
        $time = mktime(0, 0, 0, $i, 1, 2000);
        $monat = strftime("%B", $time);        
        if($i == $monthToSkip)
        {
            $toPrint = "<tr><td>$monat</td><td>*</td></tr>";
        }else{
            $toPrint = "<tr><td>$monat</td><td>$group</td></tr>";
            $group++;
        }
       
        echo $toPrint;
                
        if($group > $maxGroup)
            $group = 1;
    }    

    echo "</table>";
}

function printGroups()
{
    $filename = 'content/intern/putzliste.csv';
    if (($handle = fopen($filename, "r")) !== FALSE) 
    {
        while (($line = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $row = $line[0];
            $cells = explode(";",$row);
            echo "<tr>";
            
            foreach ($cells as $cell) {
                $tag='td';
                echo "<$tag>$cell</$tag>";
            }
            
            echo "</tr>";
        }
        fclose($handle);
    }
    
}
?>

<div>
    <h2>Jahr 2017</h2>
<?php

    /* 2016 hat mit Gruppe 6 beendet */
    $StartingGroup = 7;
    printCleaningTalbeForYear($StartingGroup);
?>

    <h2>Jahr 2016</h2>
<?php

    /* 2015 hat mit Gruppe 3 beendet */
    $StartingGroup = 4;
    printCleaningTalbeForYear($StartingGroup);
?>

</div>


</div>
<div>
    <h2>Verantwortliche</h2>
    <table>
        <tr>
            <th>Gruppe</th><th>verantwortlich</th>
        </tr>
        <tr><td>1</td><td>Johannes Albert</td></tr>
        <tr><td>2</td><td>Grammelspacher Johannes</td></tr>
        <tr><td>3</td><td>Jakob- Wiesler  Sandra</td></tr>
        <tr><td>4</td><td>Mangold Uschi</td></tr>
        <tr><td>5</td><td>Müller Florian</td></tr>
        <tr><td>6</td><td>Schneider Patricia</td></tr>
        <tr><td>7</td><td>Schweizer Berthold</td></tr>
        <tr><td>8</td><td>Weber Brigitte</td></tr>
    </table>
</div>

<div>
    <h2>Gruppeneinteilung</h2>
    <table>
        <?php
        printGroups();
        ?>
        
    </table>
</div>  
<?php
/*
echo "before<br>";
setlocale(LC_TIME, "de_DE");
echo strftime(" in German %A.\n");

setlocale(LC_TIME, "de_DE");
echo strftime("%B", mktime(3));
// Output: vrijdag 22 december 1978
echo strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));
echo "after";
// try different possible locale names for german as of PHP 4.3.0 
$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
echo "Preferred locale for german on this system is '$loc_de'";
*/
?>

<!-- 
<div class="collapsed">
    <h2>Jahr 2016</h2>
<?php
    // printCleaningTalbeForYear(5);
?>

-->
