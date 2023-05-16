<?php //tämä tiedosto hakee taloyhtiöt ja tilat toimiston käyttöön
include("config.php");
include("session.php");


$taloyhtiot = [];
$tilat = [];


$query2 = "SELECT taloyhtio_id, osoite, nimi FROM taloyhtiot";
    $data2 = $yhteys->prepare($query2);
    $data2->execute();

    while ($result2 = $data2->fetch(PDO::FETCH_ASSOC)) {
        $taloyhtiot[] = [
            'taloyhtio_id' => $result2['taloyhtio_id'],
            'osoite' => $result2['osoite'],
            'nimi' => $result2['nimi']
        ];

        $taloyhtio_id = $result2['taloyhtio_id'];
        

        $query3 = "SELECT tila_id, nimi FROM tilat WHERE taloyhtio_id = :taloyhtio_id";
        $data3 = $yhteys->prepare($query3);
        $data3->bindParam(':taloyhtio_id', $taloyhtio_id);
        $data3->execute();

        while ($result3 = $data3->fetch(PDO::FETCH_ASSOC)) {
            $tilat[] = [
                'tila_id' => $result3['tila_id'],
                'nimi' => $result3['nimi'],
                'taloyhtio_id' => $taloyhtio_id
            ];
            //echo $result3['nimi'];

        }
    }





?>