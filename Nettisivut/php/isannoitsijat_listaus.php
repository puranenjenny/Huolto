<?php 

include("config.php"); 

$kysely1 = "SELECT isannoitsija_id, etunimi, sukunimi, puhelin 
FROM isannoitsijat
WHERE NOT isannoitsija_id = '12' 
ORDER BY sukunimi;";
 
$data = $yhteys->query($kysely1); 

$JSON_isannoitsijat = '{"isannoitsijat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_isannoitsijat.= '{"id":"' .$rivi['isannoitsija_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Puhelin":"' . $rivi['puhelin'] . '"}';
    if($laskuri < $riveja) $JSON_isannoitsijat.= ","; 
}

$JSON_isannoitsijat.= ']}'; 

$yhteys = null; 

$handler = fopen("php/isannoitsijat_listaus.json", "w"); 
fwrite($handler, $JSON_isannoitsijat);
fclose($handler);


?>