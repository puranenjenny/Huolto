<?php
// php code for fetchin data from the db for main screen


require "config.php";

$query = "SELECT tehtava_id, kuvaus FROM tehtavat";
$data = $yhteys->query($query);

$JSON_vika = '{"tehtavat":[';
$counter = 0;
$rows = $data->rowCount();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    $counter++;
    $JSON_vika.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'"}';
    if($counter<$rows) $JSON_vika.=",";
}

$JSON_vika.=']}';
$yhteys = null;

$handler = fopen("../viat.json", "w");
fwrite($handler,  $JSON_vika);
fclose($handler);
//echo $JSON_vika;

?>