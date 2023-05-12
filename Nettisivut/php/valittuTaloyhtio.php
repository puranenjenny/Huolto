<?php

require "config.php";

if(isset($_GET['id'])){
    $taloyhtio_id = $_GET['id'];
    $query = "SELECT taloyhtiot.taloyhtio_id, taloyhtiot.osoite, taloyhtiot.nimi, taloyhtiot.kaupunki, taloyhtiot.postinumero, taloyhtiot.isannoitsija_id, isannoitsijat.etunimi, isannoitsijat.sukunimi 
    FROM taloyhtiot
    INNER JOIN isannoitsijat ON isannoitsijat.isannoitsija_id = taloyhtiot.isannoitsija_id
    WHERE taloyhtio_id = '$taloyhtio_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita_taloyhtio = '{"Taloyhtio":[';
    $rivi = $data->fetch(PDO::FETCH_ASSOC);

    $JSON_paivita_taloyhtio.= '{"ID":"' .$rivi['taloyhtio_id'] . '", "Osoite":"' .$rivi['osoite'] . '", "Nimi":"' . $rivi['nimi'] . '", "Kaupunki":"' . $rivi['kaupunki'] . '", "Postinumero":"' . $rivi['postinumero'] . '", "isannoitsija_id":"' . $rivi['isannoitsija_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '"}]}';   

    $yhteys = null;

    $handler = fopen("valittuTaloyhtio.json", "w");
    fwrite($handler,  $JSON_paivita_taloyhtio);
    fclose($handler);
}

$yhteys = null;
header("location:../muokkaaTaloyhtio.php");

?>