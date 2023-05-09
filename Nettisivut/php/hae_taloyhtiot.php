<?php
include("config.php");
include("session.php");

$query = "SELECT taloyhtio_id, osoite, nimi FROM taloyhtiot";
$data = $yhteys->prepare($query);
$data->execute();

$taloyhtiot = [];

while ($result = $data->fetch(PDO::FETCH_ASSOC)) {
    $taloyhtiot[] = [
        'taloyhtio_id' => $result['taloyhtio_id'],
        'osoite' => $result['osoite'],
        'nimi' => $result['nimi']
    ];
}



?>
