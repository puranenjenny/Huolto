<?php
include("config.php");
include("session.php");

$query = "SELECT isannoitsija_id, etunimi, sukunimi FROM isannoitsijat";
$data = $yhteys->prepare($query);
$data->execute();

$isannoitsijat = [];

while ($result = $data->fetch(PDO::FETCH_ASSOC)) {
    $isannoitsijat[] = [
        'isannoitsija_id' => $result['isannoitsija_id'],
        'etunimi' => $result['etunimi'],
        'sukunimi' => $result['sukunimi']
    ];
}

?>
