<?php
header("Content-Type: text/calendar");
require('PHPiCal/ical.php');
$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"];
echo file_get_contents("http://unibocalendar.duckdns.org/get_ical?timetable_url=$url&year=".$_GET["anno"]."&alert=".strval(intval($_GET["reminder"])*60))
?>


