<?php 



include("config.php"); 

$kysely = "SELECT etunimi, sukunimi, puhelin, email FROM tyontekijat"; 
$data = $yhteys->query($kysely); 

$JSON = '{"tyontekijat":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 
    $JSON.= '{"Etunimi":"' .$rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Puhelin":"' . $rivi['puhelin'] . '", "Email":"' . $rivi['email'] . '"}';
    if($laskuri < $riveja) $JSON.= ","; 
}

$JSON.= ']}'; 

$yhteys = null; 

$handler = fopen("tyontekijat.json", "w"); 
fwrite($handler, $JSON);
fclose($handler);




?>