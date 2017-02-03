<table style="width:194px;">
    <tr>
        <td align="center" style="height:194px;background:url(https://picasaweb.google.com/s/c/transparent_album_background.gif) no-repeat left">
            <a href="https://picasaweb.google.com/108506072698100270194/AbendMitMurnauer2009?authuser=0&feat=embedwebsite"><img src="https://lh4.googleusercontent.com/-AGvXtHWSmc8/UGIVzsis1vE/AAAAAAAAAEQ/sfvuDdvbvPA/s160-c/AbendMitMurnauer2009.jpg" width="160" height="160" style="margin:1px 0 0 4px;"></a></td></tr><tr><td style="text-align:center;font-family:arial,sans-serif;font-size:11px"><a href="https://picasaweb.google.com/108506072698100270194/AbendMitMurnauer2009?authuser=0&feat=embedwebsite" style="color:#4D4D4D;font-weight:bold;text-decoration:none;">
                Abend mit Murnauer 2009</a>
        </td></tr>
</table>

<embed type="application/x-shockwave-flash" src="https://picasaweb.google.com/s/c/bin/slideshow.swf" width="600" height="400" flashvars="host=picasaweb.google.com&noautoplay=1&hl=de&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F108506072698100270194%2Falbumid%2F5792216048626095857%3Falt%3Drss%26kind%3Dphoto%26hl%3Dde" pluginspage="http://www.macromedia.com/go/getflashplayer">


</embed>

<h2>Liste</h2>
    <?php
    $userid = '108506072698100270194';
    
    // build feed URL
    $feedURL = "https://picasaweb.google.com/data/feed/api/user/$userid"; //?kind=album";
    $album_feed = 'http://picasaweb.google.com/data/feed/api/user/'.$userid.'?v=2';
    
    
    $doc = new DOMDocument();
    $doc->load($feedURL);
    $albums = $doc->getElementsByTagName("entry");
  
    
    // read album feed into a SimpleXML object
    //$albums = simplexml_load_file($album_feed);
    echo "<ul>";
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
    foreach ($albums as $album) 
    {
        // get the number of photos for this album
        //$photocount = (int) $album->children('http://schemas.google.com/photos/2007')->numphotos;
        //$title = $album->getElementsByTagName("title")->nodeValue;
        //echo "<li>$title</li>\n";
    }
    
    echo "</ul>";
    
    
    // get album names and number of photos in each
    echo "<ul>";
    foreach ($sxml->entry as $entry) 
    {    
      echo "entry:<br>";
      print_r($entry);
      $title = $entry->title;
      $gphoto = $entry->children('http://schemas.google.com/photos/2007');
      $numphotos = $gphoto->numphotos;      
      echo "<li>$title - $numphotos Bilder</li>\n";
    }
    echo "</ul>";
    
    ?>