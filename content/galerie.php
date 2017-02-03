<?php
$galerie=$_GET['galerie'];
if(isset($galerie))
{
	echo"<h1>$galerie</h1>";
	$pfad="./images/galerie/".$galerie;
	$verz=opendir($pfad);
	if(opendir($pfad)!=false){
		$verz=opendir($pfad);

		$i=0;
        
        while ($file=readdir($verz)){
			if ($file!="." && $file!=".." && !is_dir($pfad."/".$file) && $file != ".svn"){
				$teile=explode(".",$file);
				$teile[1]=strtolower($teile[1]);
				if($teile[1]=="jpg" or $teile[1]=="gif"){
					$bilder[$i]=$file;
					//$size=getimagesize($img);
					$i++;
				}
			}
		}
		
		foreach($bilder as $ibild)
		{
			echo"<input type=\"hidden\" name=\"divBilder\" value=\"images/galerie/$galerie/$ibild\" />";
		}
		
		
		$anz=1;	
		echo "<table align=\"center\">";
		$i=0;
		foreach($bilder as $bild)
		{		
			$img="images/galerie/".$galerie."/".$bild;
			$imgThumb="images/galerie/".$galerie."/thumbs/".$bild;

			if($anz % 3 == 0) { $anz=0; }
			switch ($anz){
				case 1:
					echo "<tr><td class=\"imagesTdLeft\">
                                            <a href=\"$img\" rel=\"shadowbox[$galerie]\">
                                            <img name=\"$img\" class=\"thumb\" src=\"$imgThumb\">
                                                </a></td>";
					break;
				case 2:
					echo "<td class=\"imagesTdMiddle\">
                                            <a href=\"$img\" rel=\"shadowbox[$galerie]\">
                                            <img name=\"$img\" class=\"thumb\" src=\"$imgThumb\">
                                              </a></td>";
					break;
				case 0:
					echo "<td class=\"imagesTdRight\">
                                                <a href=\"$img\" rel=\"shadowbox[$galerie]\">                                            
                                                    <img name=\"$img\" class=\"thumb\" src=\"$imgThumb\">
                                                </a></td></tr>";
					break;
			}
			$anz++;
			$i++;
		}
		if($anz!=1){
			echo "</tr></table>";
		}else{
			echo "</table>";
		}
		$check="test: ".$bilder[0];
		$zoomiconwidth="35px";
		echo "<div id=\"showImg\">
		<table class=\"tableBigImg\">
		<tr height=\"30px\"><td></td></tr>
		<tr><td valign=\"middle\">
			<center>
			<div class=\"imgNavi\">
			<img class=\"linkImg\" onclick=\"zoom('in')\" src=\"images/zoomin.gif\" width=\"$zoomiconwidth\"/>
			<img class=\"linkImg\" onclick=\"zoom('out')\" src=\"images/zoomout.gif\" width=\"$zoomiconwidth\"/><br />
			<img class=\"linkImg\" src=\"images/images_prev.gif\" name=\"\" onclick=\"previous(this.name, '$bilder')\" />
			<strong><a onclick=\"hide('showImg')\" > ENDE </a></strong>
			<img class=\"linkImg\" src=\"images/images_next.gif\" onclick=\"next('showImg')\" />
			</div></center>
		</td></tr>
		<tr height=\"30px\"><td></td></tr>
		<tr><td valign=\"top\">
			<img id=\"bigImg\" name=\"\" src=\"\" />
		</td></tr>
		<tr height=\"100%\"><td></td></tr>
		</table>
		</div>";
	}
}
else
{
	echo"<h1>Galerie w&auml;hlen</h1>";
	$pfad = "images/galerie/";
	if(opendir($pfad)!=false)
	{
		$verz=opendir($pfad);
		$i=0;
		
		while ($file=readdir($verz))
		{
			if (($file!="." && $file!= ".." && $file != ".svn")){
				$modified = filemtime($filename);
				echo $file."<br />";
				$i++;				
			}
		}
	}
}
?>