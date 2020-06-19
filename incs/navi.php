<nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation"></a>
    <a href="#" title="Hide navigation"></a>

    <ul>
      <li><a href="?content=home"> Startseite </a>
          <span class="menu-separator-block"></span>
      </li>
      <li><a href="?content=beitritt"> Mitglied werden</a></li>
      <li><a href="?content=aktuell"> Aktuelles </a></li>
      <li><a href="?content=termine"> Termine </a></li>
        <li>
            <span> Über uns </span>
            <ul>
              <li><a href="?content=about"> Kapelle </a></li>
              <li><a href="?content=dirigent"> Dirigent </a></li>
              <li><a href="?content=mitteilungen"> Vereinsmitteilungen </a></li>
              <li><a href="?content=chronik"> Chronik </a></li>
            </ul>
        </li>
        <li><a href="?content=jugend"> Jugendausbildung </a>
        <li><a href="?content=presse"> Presseberichte </a></li>
        <li><a href="?content=kontakt">Kontakt</a></li>
      
        <?php
        if(isset($logoutBtn))
        {
          echo "<a>";
            echo $logoutBtn;
            echo "</a>";
        }
    ?>      
      </ul>
</nav>
