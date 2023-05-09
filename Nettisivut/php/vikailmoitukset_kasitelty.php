<?php
// php code for fetchin data from the db for main screen


require "config.php";

$query = "SELECT tehtavat.tehtava_id, tehtavat.kuvaus, taloyhtiot.osoite, tehtavan_tilanne.tehtavan_tilanne, tehtavat.jatetty, tyontekijat.etunimi, tyontekijat.sukunimi 
            FROM tehtavat 
            INNER JOIN taloyhtiot ON tehtavat.taloyhtio_id = taloyhtiot.taloyhtio_id
            INNER JOIN tyontekijat ON tyontekijat.tyontekija_id = tehtavat.tyontekija_id
            INNER JOIN tehtavan_tilanne ON tehtavat.tehtavan_tilanne_id = tehtavan_tilanne.tehtavan_tilanne_id
            WHERE tehtavat.tehtavan_tilanne_id = '2' OR tehtavat.tehtavan_tilanne_id = '3'";
$data = $yhteys->query($query);

$JSON_vika = '{"tehtavat":[';
$counter = 0;
$rows = $data->rowCount();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    $counter++;
    $JSON_vika.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Osoite":"'.$row['osoite'].'","Tilanne":"'.$row['tehtavan_tilanne'].'","Paivays":"'.$row['jatetty'].'","Etunimi":"'.$row['etunimi'].'","Sukunimi":"'.$row['sukunimi'].'"}';
    if($counter<$rows) $JSON_vika.=",";
}

$JSON_vika.=']}';
$yhteys = null;

$handler = fopen("viat.json", "w");
fwrite($handler,  $JSON_vika);
fclose($handler);
//echo $JSON_vika;

?>