<?php 

include("config.php"); 

$kysely = "SELECT yhteydenottopyynto_id, yp_nimi, yp_email, yp_numero, yp_viesti FROM yhteydenottopyynnot"; 
$data = $yhteys->query($kysely); 

$JSON_viesti = '{"yhteydenottopyynnot":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON_viesti.= '{"id":"' .$rivi['yhteydenottopyynto_id'] . '", "Nimi":"' . $rivi['yp_nimi'] . '", "Email":"' . $rivi['yp_email'] . '", "Numero":"' . $rivi['yp_numero'] . '", "Viesti":"' . $rivi['yp_viesti'] .'"}';
    if($laskuri < $riveja) $JSON_viesti.= ","; 
}

$JSON_viesti.= ']}'; 

$yhteys = null; 

$handler = fopen("yhteydenottopyynnot.json", "w"); 
fwrite($handler, $JSON_viesti);
fclose($handler);


?>