<?php 

include("config.php"); 


$kysely = "SELECT taloyhtio_id, osoite, nimi
FROM taloyhtiot"; 
$data = $yhteys->query($kysely); 

$JSON_taloyhtiot = '{" taloyhtiot":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_taloyhtiot.= '{"ID":"' .$rivi['taloyhtio_id'] . '", "Osoite":"' .$rivi['osoite'] . '", "Nimi":"' . $rivi['nimi'] . '"}';
    if($laskuri < $riveja) $JSON_taloyhtiot.= ","; 
}

$JSON_taloyhtiot.= ']}'; 

$yhteys = null; 

$handler = fopen("../taloyhtiot.json", "w"); 
fwrite($handler, $JSON_taloyhtiot);
fclose($handler);


?>