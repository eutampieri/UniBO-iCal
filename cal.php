<?php
$id = null;
if(!isset($_COOKIE["uuid"])) {
    $id = uniqid();
    setcookie("uuid", $id, time()+365*24*3600);
} else {
    $id = $_COOKIE["uuid"];
}
header("Content-Type: text/calendar");
require('PHPiCal/ical.php');
$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"];
echo file_get_contents("http://unibocalendar.duckdns.org/get_ical?timetable_url=$url&year=".$_GET["anno"]."&alert=".strval(intval($_GET["reminder"])*60)."&uuid=eu.eutampieri.cal-unibo.".$id.'.'.md5($_SERVER["HTTP_CF_CONNECTING_IP"]));
?>


