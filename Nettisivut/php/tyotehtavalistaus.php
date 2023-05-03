<?php 

include("config.php"); 

$kysely = "SELECT tehtava_id, kuvaus, korjaustoimenpide, tila, tyyppi, tila_id, yleisavaimen_kaytto, tehtavan_tyyppi_id, tyontekija_id, tehtavan_tilanne_id FROM tehtavat"; 
$data = $yhteys->query($kysely); 

$JSON = '{"tehtavat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON.= '{"Tehtava_id":"' .$rivi['tehtava_id'] . '", "Kuvaus":"' . $rivi['kuvaus'] . '", "Korjaustoimenpide":"' . $rivi['korjaustoimenpide'] . '", "tila":"' . $rivi['tila'] . '", "Tyyppi":"' . $rivi['tyyppi'] . '", "tila_id":"' . $rivi['tila_id'] .'", "yleisavaimen_kaytto":"' . $rivi['yleisavaimen_kaytto'] .'", "tehtavan_tyyppi_id":"' . $rivi['tehtavan_tyyppi_id'] .'", "tyontekija_id":"' . $rivi['tyontekija_id'] .'", "tehtavan_tilanne_id":"' . $rivi['tehtavan_tilanne_id'] .'"}';
    if($laskuri < $riveja) $JSON.= ","; 
}

$JSON.= ']}'; 

$yhteys = null; 

$handler = fopen("tyotehtavat.json", "w"); 
fwrite($handler, $JSON);
fclose($handler);


?>