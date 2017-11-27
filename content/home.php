

<?php

$refDate=new DateTime("2017-11-26 16:00:00");
$nowDate=new DateTime('NOW');

if($nowDate < $refDate)
    {
    echo '';
        $staticMessageStyle="display: none; visibility: hidden; height: 0px;";
        $tempNewsStyle="visibility: visible;";
    }else{
        $staticMessageStyle="visibility: visible;";
        $tempNewsStyle="display: none; visibility: hidden; height: 0px;";
    }
?>

<div style="<?php echo $staticMessageStyle;  ?>">
    <div id="loader" >
        <h1>Herzlich Willkommen</h1>
        <p class="center">der Inhalt wird geladen...</p>
        <img class="center" src="./images/layout/laden.gif">
    </div>
    <div id="facebookContainer">
        <?php
        include './content/facebook.php';
        ?>
    </div>
</div>

<div style="<?php echo $tempNewsStyle;  ?>">

    <a href="?content=aktuell">
       <p>
           <img
               width="40%"
               class="shaddow center"
               alt="Plakat Konzert 2017"
               src="./images/konzerte/2017_11.gif" />
        </p> 
    </a>
    <h2>Vorverkaufsstellen
    </h2>
    <ul>
        <li><span class="bold">Versicherungsbüro Markus Zahn</span>, Hexentalstraße 48, 79283 Bollschweil</li>
        <li><span class="bold">s`Brotkörble</span>, Leimbachweg 3, 79283 Bollschweil </li>
        <li><span class="bold">Stuben-Strauße</span>, Hexentalstr. 46, 79283 Bollschweil</li>
        
    </ul>
</div>