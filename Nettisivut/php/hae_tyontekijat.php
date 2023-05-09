<?php 

include("config.php"); 
$rooli_id = '2';

$kysely = "SELECT tyontekijat.tyontekija_id, tyontekijat.etunimi, tyontekijat.sukunimi, kayttajat.rooli_id 
FROM tyontekijat INNER JOIN kayttajat ON tyontekijat.kayttaja_id = kayttajat.kayttaja_id
 WHERE rooli_id = $rooli_id"; 
$data = $yhteys->query($kysely); 

$JSON_tyontekijat = '{"tyontekijat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_tyontekijat.= '{"ID":"' .$rivi['tyontekija_id'] . '", "Etunimi":"' .$rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '"}';
    if($laskuri < $riveja) $JSON_tyontekijat.= ","; 
}

$JSON_tyontekijat.= ']}'; 

$yhteys = null; 

$handler = fopen("tyontekijat.json", "w"); 
fwrite($handler, $JSON_tyontekijat);
fclose($handler);


?>