

<?php

$refDate=new DateTime("2018-07-07 23:00:00");
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
               width="30%"
               class="shaddow center"
               alt="Plakat Schlosskonzert 2018"
               src="./images/konzerte/2018_07_big.jpg" />
        </p> 
    </a>
    <p>
Die Trachtenkapelle Bollschweil lädt zu einem besonderen Konzert,
unter dem Motto <a href="?content=aktuell">„Jazz trift Blasmusik“</a> in den historischen
Schlosshof von Schloss Bollschweil ein.</p>
    <p><a href="?content=aktuell">Weitere Informationen</a></p>
</div>