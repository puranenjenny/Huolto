<?php
require "config.php";


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


$tyontekija_id = $_SESSION['tyontekija_id'];


$query = "SELECT t.tehtava_id, tt.tehtavan_tilanne, t.kuvaus, CONCAT(u.etunimi, ' ', u.sukunimi) AS Jattaja, th.osoite, a.rappu, t.yleisavaimen_kaytto, t.numero, ti.nimi AS tilan_nimi, ty.etunimi AS tyontekijan_etunimi, ty.sukunimi AS tyontekijan_sukunimi
          FROM tehtavat t
          JOIN kayttajat k ON t.kayttaja_id = k.kayttaja_id
          JOIN (
                SELECT asukas_id AS id, kayttaja_id, etunimi, sukunimi FROM asukkaat
                UNION ALL
                SELECT tyontekija_id AS id, kayttaja_id, etunimi, sukunimi FROM tyontekijat
                UNION ALL
                SELECT isannoitsija_id AS id, kayttaja_id, etunimi, sukunimi FROM isannoitsijat
               ) u ON k.kayttaja_id = u.kayttaja_id
          JOIN taloyhtiot th ON t.taloyhtio_id = th.taloyhtio_id
          JOIN tehtavan_tilanne tt ON t.tehtavan_tilanne_id = tt.tehtavan_tilanne_id
          LEFT JOIN tilat ti ON t.tila_id = ti.tila_id
          LEFT JOIN tyontekijat ty ON t.tyontekija_id = ty.tyontekija_id
          LEFT JOIN asukkaat a ON u.kayttaja_id = a.kayttaja_id
          WHERE t.tehtavan_tilanne_id <> 4 AND t.tyontekija_id = :tyontekija_id
          ORDER BY t.tehtava_id";
        //ORDER BY tt.tehtavan_tilanne";
        //ORDER BY tt.tehtavan_tilanne DESC"; --iha miten halutaankaa sortata

        try {
          $data = $yhteys->prepare($query);
          $data->bindParam(':tyontekija_id', $_SESSION['tyontekija_id']);
          $data->execute();
        } catch(PDOException $e) {
          die("Tapahtui virhe: " . $e->getMessage());
        }
        
        if ($data->rowCount() < 1) {
          die("Ei omia työtehtäviä tällähetkellä.");
        }

$JSON_vika = '{"tehtavat":[';
$counter = 0;
$rows = $data->rowCount();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    $counter++;
    $tilan_nimi = $row['tilan_nimi'] ? $row['tilan_nimi'] : 'Ei määritelty';
    $tyontekijan_etunimi = $row['tyontekijan_etunimi'] ? $row['tyontekijan_etunimi'] : 'Ei määritelty';
    $tyontekijan_sukunimi = $row['tyontekijan_sukunimi'] ? $row['tyontekijan_sukunimi'] : '';

    $JSON_vika.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Jattaja":"'.$row['Jattaja'].'","Rappu":"'.$row['rappu'].'","Osoite":"'.$row['osoite'].'","Yleisavaimen_kaytto":"'.$row['yleisavaimen_kaytto'].'","Numero":"'.$row['numero'].'","Tilanne":"'.$row['tehtavan_tilanne'].'","Tila":"'.$tilan_nimi.'","Tyontekija":"'.$tyontekijan_etunimi.' '.$tyontekijan_sukunimi.'"}';
    if($counter<$rows) $JSON_vika.=",";
}

$JSON_vika.=']}';
$yhteys = null;

$handler = fopen("viat.json", "w");
fwrite($handler,  $JSON_vika);
fclose($handler);


?>
