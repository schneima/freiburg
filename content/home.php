

<?php

$refDate=new DateTime("2022-05-14 23:50:00");
$nowDate=new DateTime('NOW');

if($nowDate < $refDate)
    {
        $staticMessageStyle="display: none; visibility: hidden; height: 0px;";
        $tempNewsStyle="visibility: visible;";
    }else{
        $staticMessageStyle="visibility: visible; width: 100%;";
        $tempNewsStyle="display: none; visibility: hidden; height: 0px;";
    }
?>

<div style="<?php echo $tempNewsStyle;  ?>">
    <a href="?content=aktuell">
        <img
            id="homeImage"
            src="./images/konzerte/2022_05_Eintrittskarte.jpg"
            alt="2022 Frühjahrskonzert" />
    </a>
</div>


<!-- TODO: https://www.youtube.com/watch?v=flauMZdycgw
-->

<div style="<?php echo $staticMessageStyle;  ?>">
        <h1>Herzlich Willkommen</h1>
    <img 
     id="homeImage" 
     src="images/zermatt_2019_title.jpg" 
     lowsrc="images/zermatt_2019_title_small.jpg">
</div>
