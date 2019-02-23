

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

<div style="<?php echo $tempNewsStyle;  ?>">
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

<div style="<?php echo $staticMessageStyle;  ?>">
        <h1>Herzlich Willkommen</h1>

    <img 
     id="homeImage" 
     width="800px"
     height="534px"
     src="images/schloss_2011.jpg" 
     lowsrc="kapelle_schloss_small.jpg">
</div>