

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

<h1> Fronleichnam 2021</h1>

<h3>
Besondere Situationen erfordern besondere Maßnahmen
</h3>
<h3>

Aus diesem Grund haben wir uns dieses Jahr etwas einfallen lassen zu unserem traditionellen Fronleichnamshock-Termin:
</h3>

<div>

    <a href="images/news/fronleichnam-2021/flyer-1.jpeg"
       rel="shadowbox['news75']">
        <img name="images/news/fronleichnam-2021/flyer-1.jpeg" 
             class="thumb" 
             src="images/news/fronleichnam-2021/flyer-1.jpeg"
             alt="Fronleichnamshock To Go 2021">
    </a>

    <a href="images/news/fronleichnam-2021/flyer-1.jpeg"
       rel="shadowbox['news75']">
    </a>

</a>
<p>

<a href="media/2021-Fronleichnam-to-go-flyer.pdf" >
Flyer zum Download
</a>
</p>
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