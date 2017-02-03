<?php 
$pfad="images/galerie/";
$i=0;
$oeffnen=opendir($pfad);

if(isset($_GET['galerie']))
{	
	$galerie = $_GET['galerie'];
	echo"<a href=\"?content=bilder\"><img src=\"images/btn_zurueck.gif\" align=\"middle\"/>zur&uuml;ck</a><br />";
	echo"";
	
	include('./content/galerie.php');
}
else
{

/*
if($oeffnen==true){
	$verz=opendir($pfad);
	while ($file=readdir($verz)){
		if ($file!="." && $file!=".."){	
			$modified = filemtime($pfad.$file);
			$galeries[$i]=$file;
			$mod[$i] = $modified;
			echo $mod[$i]."<br />";
			$i++;
		}
	}
	closedir($verz);
}*/

	echo"<h1>Galerie w&auml;hlen</h1>";
	$pfad = "images/galerie/";

	$width="150px";
	
	if(opendir($pfad)!=false)
	{
		$verz=opendir($pfad);
		$i=0;
		$anz=1;
		 //echo "<table width=\"100%\" align=\"center\" border=\"1px\">";
         echo "<ul>";
		while ($file=readdir($verz))
		{
			if (($file!="." && $file!=".." & $file != ".svn"))
            {
                
                
            echo "<li><a href=\"?content=bilder&galerie=$file\">$file</a></li>";
            // version for showing links in table    
            /*
            if($anz % 3 == 0) { $anz=0; }
			switch ($anz)
			{
				case 1:
					echo "<tr><td align=\"center\" >
					<img src=\"images/kieselstein.gif\" width=\"$width\" /><a href=\"?content=bilder&galerie=$file\"><div class=\"lb_galerie\">".$file."</div></a></td>";
				break;
				
				case 2:
					echo "<td align=\"center\"><img src=\"images/kieselstein.gif\" width=\"$width\"/><a href=\"?content=bilder&galerie=$file\"><div class=\"lb_galerie\">".$file."</div></a></td>";
				break;
				
				case 3:
					echo "<td align=\"center\"><img src=\"images/kieselstein.gif\" width=\"$width\"/><a href=\"?content=bilder&galerie=$file\"><div class=\"lb_galerie\">".$file."</div></a></td>";
				break;
				
				case 0:
					echo"<td align=\"center\"><img src=\"images/kieselstein.gif\" width=\"$width\"/><a href=\"?content=bilder&galerie=$file\"><div class=\"lb_galerie\">".$file."</div></a></td></tr>";
				break;
			}
             */
				$anz++;
				$i++;				
			}
		}
        echo '</ul>';
        /*
		if($anz!=1){
			echo "</tr></table>";
		}else{
			echo "</table>";
		}
         * 
         */
		//echo"</table>";
	}
}
?>