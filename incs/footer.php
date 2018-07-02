<div id="footer">

    <a class="linksFooter" href="?content=datenschutz">Datenschutz</a>
    <a class="linksFooter" href="?content=impressum">Impressum</a>
    <a class="linksFooter" href="?content=links"> Links </a>
    <a class="linksFooter" href="?content=aktuell&amp;f=archiv"> Archiv </a>
<?php

if ($LoginIsAvailable) 
{
    echo "<a class=\"linksFooter\" href=\"?content=login\"> Intern </a>";
}
?>

<?php 
if($isLocal)
{
    include 'incs/htmlcss_validator.php';
}
?>
</div>