<?php
include("config.php");
include("hae_kayttajaid.php");

$taloyhtio_id = "";

$query = "SELECT asukas_id FROM asukkaat WHERE kayttaja_id = :kayttaja_id";
//echo $kayttaja_id;
$data = $yhteys->prepare($query);
$data->bindParam(':kayttaja_id', $kayttaja_id);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);
$asukas_id = $result['asukas_id'];


$query2 = "SELECT taloyhtio_id FROM asukkaat WHERE asukas_id = :asukas_id";
$data2 = $yhteys->prepare($query2);
$data2->bindParam(':asukas_id', $asukas_id);
$data2->execute();
$result2 = $data2->fetch(PDO::FETCH_ASSOC);

if ($result2) {
    $taloyhtio_id = $result2['taloyhtio_id'];
  }

?>
