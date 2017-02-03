<nav id="navi">
    <ul>
        <li><a href="?content=home"> Startseite </a></li>
        <li><a href="?content=beitritt"> Mitglied werden</a></li>
        
        <li><a href="?content=aktuell"> Aktuelles </a></li>
        <li><a href="?content=termine"> Termine </a></li>
        <li><a href="?content=about"> Über uns </a>
            <ul>
                <li><a href="?content=about"> Kapelle </a></li>
                <li><a href="?content=dirigent"> Dirigent </a></li>
                <li><a href="?content=mitteilungen"> Vereinsmittleiungen </a></li>
                <li><a href="?content=chronik"> Chronik </a></li>
            
            </ul>
        
        </li>
        
        <li><a href="?content=jugend"> Jugendausbildung </a>

        </li>
        <li><a href="?content=bilder"> Bilder </a></li>
        <li><a href="?content=presse"> Presseberichte </a></li>
        <li>
            <a onClick="window.open('guestbook/index.php', 'G&auml;stebuch','toolbar=no,status=no,menubar=no,scrollbars=1,width=550,height=600,left=200,top=50');"> G&auml;stebuch </a>
        </li>
        <li>    <a  href="?content=vorstand">Kontakt</a>
</li>
        <?php
        if(isset($logoutBtn))
        {
            echo $logoutBtn;
        }
        // echo "<br ><img src=\"images/$imgOnline\" width=\"15px\" alt=\"\" > $lbOnline";
    ?>
</ul>
</nav>