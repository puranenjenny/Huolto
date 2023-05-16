<?php //tämä tiedosto hakee roolit
include("config.php");
include("session.php");

$query = "SELECT rooli_id, rooli FROM roolit WHERE rooli_id < 3";
$data = $yhteys->prepare($query);
$data->execute();

$roolit = [];

while ($result = $data->fetch(PDO::FETCH_ASSOC)) {
    $roolit[] = [
        'rooli_id' => $result['rooli_id'],
        'rooli' => $result['rooli']
    ];
}

?>
