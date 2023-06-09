<?php

require "config.php";

$query = "SELECT tehtavat.tehtava_id, tehtavat.kuvaus, taloyhtiot.osoite, tehtavat.jatetty, CONCAT(u.etunimi, ' ', u.sukunimi) AS ilmoittaja
            FROM tehtavat
            JOIN kayttajat ON kayttajat.kayttaja_id = tehtavat.kayttaja_id
            JOIN (SELECT kayttaja_id, etunimi, sukunimi FROM asukkaat
                    UNION ALL
                    SELECT kayttaja_id, etunimi, sukunimi FROM tyontekijat
                    UNION ALL
                    SELECT kayttaja_id, etunimi, sukunimi FROM isannoitsijat
                ) u ON kayttajat.kayttaja_id = u.kayttaja_id
            INNER JOIN taloyhtiot ON tehtavat.taloyhtio_id = taloyhtiot.taloyhtio_id
            WHERE tehtavat.tehtavan_tilanne_id = '1' OR tehtavat.tyontekija_id = ''";
$data = $yhteys->query($query);

$JSON_vika = '{"tehtavat":[';
$counter = 0;
$rows = $data->rowCount();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    $counter++;
    $JSON_vika.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Osoite":"'.$row['osoite'].'","Paivays":"'.$row['jatetty'].'","Ilmoittaja":"'.$row['ilmoittaja'].'"}';
    if($counter<$rows) $JSON_vika.=",";
}

$JSON_vika.=']}';
$yhteys = null;

$handler = fopen("viat.json", "w");
fwrite($handler,  $JSON_vika);
fclose($handler);

?>