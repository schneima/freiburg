

<?php

$refDate=new DateTime("2019-11-23 23:50:00");
$nowDate=new DateTime('NOW');

if($nowDate < $refDate)
    {
    echo '';
        $staticMessageStyle="display: none; visibility: hidden; height: 0px;";
        $tempNewsStyle="visibility: visible;";
    }else{
        $staticMessageStyle="visibility: visible; width: 100%;";
        $tempNewsStyle="display: none; visibility: hidden; height: 0px;";
    }
?>

<div style="<?php echo $tempNewsStyle;  ?>">

   <a href="?content=aktuell">
       <p>
           <img
               width="500px"
               class="shaddow center"
               alt="Plakat Jahreskonzert 2019"
               src="./images/konzerte/2019_11_Jahreskonzert_500px.jpg" />
        </p> 
    </a>
    <p class="center">
        <br>
        Zu unserem diesjährigen Jahreskonzert am<br>
    <span class="bold">Samstag den 23. November 2019 um 20.00 Uhr</span>
        <br>laden wir Sie recht herzlich ein. 
        <br><a href="?content=aktuell">Weitere Informationen</a></p>
</div>
<div style="<?php echo $staticMessageStyle;  ?>">
        <h1>Herzlich Willkommen</h1>

    <img 
     id="homeImage" 
     width="100%"
     height="auto"
     src="images/zermatt_2019_title.jpg" 
     lowsrc="images/zermatt_2019_title_small.jpg">
</div>