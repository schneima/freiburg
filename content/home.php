

<?php

$refDate=new DateTime("2018-11-24 23:00:00");
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
               alt="Plakat Jahreskonzert 2018"
               src="./images/konzerte/2018_11_Jahreskonzert_500px.png" />
        </p> 
    </a>
    <p class="center">
        <br>
        Zu unserem diesjährigen Jahreskonzert am<br>
    <span class="bold">Samstag den 24. November 2018 um 20.00 Uhr</span>
        <br>laden wir Sie recht herzlich ein. 
        <br><a href="?content=aktuell">Weitere Informationen</a></p>
</div>