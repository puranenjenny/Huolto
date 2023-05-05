<?php
include 'config.php';
include 'session.php';

// haetaan taloyhtiot data
$query_taloyhtiot = "SELECT taloyhtio_id, nimi, osoite FROM taloyhtiot";
$data_taloyhtiot = $yhteys->prepare($query_taloyhtiot);
$data_taloyhtiot->execute();
$taloyhtiot = $data_taloyhtiot->fetchAll(PDO::FETCH_ASSOC);

// kirjoitetaan ne jsoniin
file_put_contents('taloyhtiot.json', json_encode($taloyhtiot));

// haetaan tilat data
$query_tilat = "SELECT tila_id, nimi, taloyhtio_id FROM tilat";
$data_tilat = $yhteys->prepare($query_tilat);
$data_tilat->execute();
$tilat = $data_tilat->fetchAll(PDO::FETCH_ASSOC);

// kirjoitetaan ne jsoniin
file_put_contents('tilat.json', json_encode($tilat));

?>