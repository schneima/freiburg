

<?php

$refDate=new DateTime("2016-11-19 23:30:00");
$nowDate=new DateTime('NOW');

if($nowDate < $refDate)
    {
        $afterStyle="visibility: collapse; height: 0px;";
        $beforeStyle="visibility: visible;";
    }else{
        $afterStyle="visibility: visible;";
        $beforeStyle="visibility: collapse; height: 0px;";
    }
?>

<div style="<?php echo $afterStyle;  ?>" >
    <div>
       <p>
           <img
               class="shaddow"
               alt="Bild Kapelle"
               src="./images/schloss_snippet.jpg" />
        </p>    
    </div>
</div>

<div style="<?php echo $beforeStyle;  ?>">

    <a href="?content=aktuell">
       <p>
           <img
               width="500px"
               class="shaddow"
               alt="Plakat Konzert 2016"
               src="./images/konzerte/2016_11.jpg" />
        </p> 
    </a>
</div>

<p>
    Der Bericht vom Jahreskonzert ist ab sofort verfügbar unter <a href="?content=aktuell">Aktuelles...</a>
</p>

<!-- style="<?php echo $afterStyle;  ?>" -->
<div style="<?php echo $afterStyle;  ?>"  >
<p class="strong">Termine Vorschau:</p>
    <ul>
        <li>Samstag, 25.03.2017, Ensemble-Konzert, Möhlinhalle</li>
        <li>Donnerstag, 15.06.2017, Fronleichnamshock, Weingut Mangold</li>
        <li>Samstag, 25.11.2017, Jahreskonzert, Möhlinhalle</li>
    </ul>
</div>