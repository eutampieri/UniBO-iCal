<?php
header("Content-Type: text/calendar");
require('PHPiCal/ical.php');
$url = null;
if(file_get_contents("https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"]."/orario-lezioni/@@orario_reale_json?anno=".$_GET["anno"]) === false) {
	$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"]."/timetable";
	$raw = file_get_contents($url);
} else {
	$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"]."/orario-lezioni";
}
header("Location: http://unibocalendar.duckdns.org/get_ical?timetable_url=$url&year=".$_GET["anno"]."&alert=".$_GET["reminder"])
?>


