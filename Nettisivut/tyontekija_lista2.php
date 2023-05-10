<?php include "php/config.php"
?>
<?php

// suoritetaan SQL-kysely
$sql =$kysely = "SELECT tyontekijat.tyontekija_id, tyontekijat.etunimi, tyontekijat.sukunimi, tyontekijat.puhelin, tyontekijat.email, tyontekijan_tilanne.tyontekijan_tilanne, roolit.rooli 
FROM (tyontekijat INNER JOIN kayttajat ON tyontekijat.kayttaja_id = kayttajat.kayttaja_id)
INNER JOIN roolit ON kayttajat.rooli_id = roolit.rooli_id
INNER JOIN tyontekijan_tilanne ON tyontekijat.tyontekijan_tilanne_id = tyontekijan_tilanne.tyontekijan_tilanne_id
ORDER BY rooli;"; 
$stmt = $yhteys->prepare($sql);
$stmt->execute();

// tallennetaan haetut tiedot taulukkoon
$tyontekijat = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $tyontekijat[] = $row;
}

// suljetaan tietokantayhteys
$yhteys = null;

// muunnetaan taulukko JSON-muotoon
$JSON_tyontekijat = json_encode($tyontekijat);

?>