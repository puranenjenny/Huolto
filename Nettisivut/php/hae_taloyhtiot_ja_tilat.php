<?php //tämä tiedosto hakee taloyhtiöt ja tilat
include("config.php");
include("session.php");

$taloyhtiot = [];
$tilat = [];

$query = "SELECT isannoitsija_id FROM isannoitsijat WHERE kayttaja_id = :kayttaja_id";
//echo $kayttaja_id;
$data = $yhteys->prepare($query);
$data->bindParam(':kayttaja_id', $kayttaja_id);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $isannoitsija_id = $result['isannoitsija_id'];

    $query2 = "SELECT taloyhtio_id, osoite, nimi FROM taloyhtiot WHERE isannoitsija_id = :isannoitsija_id";
    //echo $isannoitsija_id;
    $data2 = $yhteys->prepare($query2);
    $data2->bindParam(':isannoitsija_id', $isannoitsija_id);
    $data2->execute();

    while ($result2 = $data2->fetch(PDO::FETCH_ASSOC)) {
        $taloyhtiot[] = [
            'taloyhtio_id' => $result2['taloyhtio_id'],
            'osoite' => $result2['osoite'],
            'nimi' => $result2['nimi']
        ];
        //echo $result2['osoite'];
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
}


?>
