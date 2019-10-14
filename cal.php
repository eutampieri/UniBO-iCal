<?php
header("Content-Type: text/calendar");
require('PHPiCal/ical.php');
date_default_timezone_set('Europe/Rome');
$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"]."/orario-lezioni/@@orario_reale_json?anno=".$_GET["anno"];
error_log($url);
$dati = json_decode(file_get_contents($url), true);
$orario = [];
foreach($dati["events"] as $lezione) {
	$data = date_create_from_format("Y-m-d\TH:i:s", $lezione["start"]);
	$fine = date_create_from_format("Y-m-d\TH:i:s", $lezione["end"]);
	$descrizione = $lezione["title"].' - '.$lezione["aule"][0]["des_risorsa"];
	array_push($orario, [
		"start" => date_format($data, "U"),
		"end" => date_format($fine, "U"),
		"desc" => $descrizione
	]);
}
$cal = new iCalendar(intval($_GET["reminder"]);
echo $cal->ical($orario);
?>


