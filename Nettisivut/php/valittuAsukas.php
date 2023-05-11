<?php

require "config.php";

if(isset($_GET['id'])){
    $asukas_id = $_GET['id'];
    $query = "SELECT asukkaat.asukas_id , asukkaat.etunimi, asukkaat.sukunimi, asukkaat.taloyhtio_id, taloyhtiot.nimi, asukkaat.rappu
    FROM asukkaat
    INNER JOIN taloyhtiot ON asukkaat.taloyhtio_id = taloyhtiot.taloyhtio_id
    WHERE asukas_id = '$asukas_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita_asukas = '{"Asukas":[';
    $rivi = $data->fetch(PDO::FETCH_ASSOC);

    $JSON_paivita_asukas.= '{"id":"' .$rivi['asukas_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Taloyhtio-ID":"' . $rivi['taloyhtio_id'] . '", "Taloyhtio":"' . $rivi['nimi'] . '", "Rappu":"' . $rivi['rappu'] . '"}]}';
        

    $yhteys = null;

    $handler = fopen("valittuAsukas.json", "w");
    fwrite($handler, $JSON_paivita_asukas);
    fclose($handler);
}

$yhteys = null;
header("location:../muokkaaAsukas.php");

?>