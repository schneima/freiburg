

<?php

$refDate=new DateTime("2020-01-05 23:50:00");
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
               alt="Theater 2020"
               src="./images/news/70.jpg" />
        </p> 
    </a>
    <p class="center">
        <br>
        Zur öffentlichen Weihnachtsfeier am<br>
    <span class="bold red">Sonntag, den 05. Januar 2020 um 19.30 Uhr</span>
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