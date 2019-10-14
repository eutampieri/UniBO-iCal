<?php
header("Content-Type: text/calendar");
$url = "https://corsi.unibo.it/".$_GET["tipoCorso"].'/'.$_GET["nomeCorso"]."orario-lezioni/@@orario_reale_json?anno=".$_GET["anno"];
$dati = json_decode(file_get_contents($url));
$orario = [];
foreach($dati["events"] as $evento) {
	$data = strptime($lezione["start"], "%FT%T");
	$fine = strptime($lezione["end"], "%FT%T");
	$descrizione = $lezione["title"].' - '.$lezione["aule"][0]["des_risorsa"];
	array_push($orario, [
		"start" =>$data,
		"end" => $data+3600,
		"desc" => $descrizione
	]);
}
$cal = new iCalendar();
echo $cal->ical($orario);
?>
