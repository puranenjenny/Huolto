<?php
// php code for fetchin data from the db for main screen


require "config.php";

$query = "SELECT tehtavat.tehtava_id, tehtavat.kuvaus, taloyhtiot.osoite, tehtavat.jatetty 
            FROM (tehtavat INNER JOIN kayttajat ON tehtavat.kayttaja_id = kayttajat.kayttaja_id)
            INNER JOIN asukkaat ON asukkaat.kayttaja_id = kayttajat.kayttaja_id
            INNER JOIN taloyhtiot ON taloyhtiot.taloyhtio_id = asukkaat.taloyhtio_id
            WHERE tehtavat.tehtavan_tilanne_id = '1'";
$data = $yhteys->query($query);

$JSON_vika = '{"tehtavat":[';
$counter = 0;
$rows = $data->rowCount();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    $counter++;
    $JSON_vika.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Osoite":"'.$row['osoite'].'","Paivays":"'.$row['jatetty'].'"}';
    if($counter<$rows) $JSON_vika.=",";
}

$JSON_vika.=']}';
$yhteys = null;

$handler = fopen("viat.json", "w");
fwrite($handler,  $JSON_vika);
fclose($handler);
//echo $JSON_vika;

?>