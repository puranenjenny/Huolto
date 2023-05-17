<?php 

include("config.php"); 


$kysely = "SELECT taloyhtiot.taloyhtio_id, taloyhtiot.osoite, taloyhtiot.nimi, taloyhtiot.kaupunki, taloyhtiot.postinumero, taloyhtiot.isannoitsija_id, isannoitsijat.etunimi, isannoitsijat.sukunimi 
FROM taloyhtiot
LEFT JOIN isannoitsijat ON isannoitsijat.isannoitsija_id = taloyhtiot.isannoitsija_id
WHERE NOT taloyhtio_id = '21'
";
$data = $yhteys->query($kysely); 

$JSON_taloyhtiot = '{" taloyhtiot":['; 
$laskuri = 0; 
$riveja = $data->rowCount(); 

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
    $laskuri++; 

    $isannoitsija_etunimi = $rivi['etunimi'] ? $rivi['etunimi'] : 'Ei isännöitsijää';
    $isannoitsija_sukunimi = $rivi['sukunimi'] ? $rivi['sukunimi'] : '';

    $JSON_taloyhtiot.= '{"ID":"' .$rivi['taloyhtio_id'] . '", "Osoite":"' .$rivi['osoite'] . '", "Nimi":"' . $rivi['nimi'] . '", "Kaupunki":"' . $rivi['kaupunki'] . '", "Postinumero":"' . $rivi['postinumero'] . '", "isannoitsija_id":"' . $rivi['isannoitsija_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '","Isannoitsija":"'.$isannoitsija_etunimi.' '.$isannoitsija_sukunimi.'"}';
    if($laskuri < $riveja) $JSON_taloyhtiot.= ","; 
}

$JSON_taloyhtiot.= ']}'; 

$yhteys = null; 

$handler = fopen("taloyhtiot.json", "w"); 
fwrite($handler, $JSON_taloyhtiot);
fclose($handler);


?>