<?php 

include("config.php"); 

$kysely = "SELECT tyontekijat.tyontekija_id, tyontekijat.etunimi, tyontekijat.sukunimi, tyontekijat.puhelin, tyontekijat.email, tyontekijan_tilanne.tyontekijan_tilanne, roolit.rooli 
FROM (tyontekijat INNER JOIN kayttajat ON tyontekijat.kayttaja_id = kayttajat.kayttaja_id)
INNER JOIN roolit ON kayttajat.rooli_id = roolit.rooli_id
INNER JOIN tyontekijan_tilanne ON tyontekijat.tyontekijan_tilanne_id = tyontekijan_tilanne.tyontekijan_tilanne_id
ORDER BY rooli;"; 
$data = $yhteys->query($kysely); 

$JSON_tyontekijat = '{"tyontekijat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_tyontekijat.= '{"ID":"' .$rivi['tyontekija_id'] . '", "Etunimi":"' .$rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Puhelin":"' . $rivi['puhelin'] . '", "Email":"' . $rivi['email'] . '", "Tila":"' . $rivi['tyontekijan_tilanne'] . '", "Rooli":"' . $rivi['rooli'] . '"}';
    if($laskuri < $riveja) $JSON_tyontekijat.= ","; 
}

$JSON_tyontekijat.= ']}'; 

$yhteys = null; 

$handler = fopen("tyontekijat.json", "w"); 
fwrite($handler, $JSON_tyontekijat);
fclose($handler);


?>