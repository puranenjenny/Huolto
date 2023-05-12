<?php 

include("config.php"); 

$kysely1 = "SELECT asukas_id, etunimi, sukunimi, nimi 
FROM asukkaat INNER JOIN taloyhtiot ON asukkaat.taloyhtio_id = taloyhtiot.taloyhtio_id
ORDER BY nimi;";
 
$data = $yhteys->query($kysely1); 

$JSON_kayttaja = '{"kayttajat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_kayttaja.= '{"id":"' .$rivi['asukas_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Taloyhtio":"' . $rivi['nimi'] . '"}';
    if($laskuri < $riveja) $JSON_kayttaja.= ","; 
}

$JSON_kayttaja.= ']}'; 

$yhteys = null; 

$handler = fopen("php/kayttajat_listaus.json", "w"); 
fwrite($handler, $JSON_kayttaja);
fclose($handler);


?>