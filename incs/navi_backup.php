<div id="menu">
<a href="?content=home"> Startseite </a>
<a href="?content=aktuell"> Aktuelles </a>
<a href="?content=termine"> Termine </a>
<a href="?content=about"> Über uns </a>
<a href="?content=dirigent"> Dirigent </a>
<a href="?content=vorstand"> Vorstand </a>

<a onClick="window.open('guestbook/index.php', 'G&auml;stebuch','toolbar=no,status=no,menubar=no,scrollbars=1,width=550,height=600,left=200,top=50');"> G&auml;stebuch </a>

<a href="#"> Jugend 
        <span class="info">
        <input class="link" type="button" onClick="go('?content=jugend');" value="Jugendausbildung">
        <input class="link" type="button" onClick="go('?content=bklasse');" value="Bläserklasse">
        <input class="link" type="button" onClick="go('?content=jugendkapelle');" value="Jugendkapelle">
        </span>
</a>
<a href="?content=chronik"> Chronik </a>
<a href="?content=bilder"> Bilder </a>
<a href="?content=login"> Mitglieder </a>
<a href="?content=presse"> Presseberichte </a>
<a href="?content=wewantyou"> We Want You! </a>

<?php
if(isset($logoutBtn))
{
    echo $logoutBtn;
}
// echo "<br ><img src=\"images/$imgOnline\" width=\"15px\" alt=\"\" > $lbOnline";
    ?>
</div>