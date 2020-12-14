

<?php

$refDate=new DateTime("2020-12-23 23:50:00");
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

<div>
    <img class="center adjustedFullWidth" src="images/xmas.jpg">
    <?php
    include('content/corona.php');
    ?>

</div>


<!-- TODO: https://www.youtube.com/watch?v=flauMZdycgw
-->
<!--

<div style="<?php echo $staticMessageStyle;  ?>">
        <h1>Herzlich Willkommen</h1>

    <img 
     id="homeImage" 
     width="100%"
     height="auto"
     src="images/zermatt_2019_title.jpg" 
     lowsrc="images/zermatt_2019_title_small.jpg">
</div>

-->