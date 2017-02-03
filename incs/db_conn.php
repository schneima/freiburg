<?php
try{
    mysql_connect("localhost", "dummy", "dummy");
    $sel = mysql_select_db("musik");
    define("SQLCONN", $sel);
}  catch (Exception $e){
    define("SQLCONN", false);
}
?>
