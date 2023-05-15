<?php

require "config.php";

if(isset($_GET['id'])){
    $isannoitsija_id = $_GET['id'];
    $query = "SELECT  isannoitsija_id, etunimi, sukunimi, email, puhelin, kayttaja_id
    FROM isannoitsijat
    WHERE isannoitsija_id = '$isannoitsija_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita_isannoitsija = '{"Isannoitsija":[';
    $rivi = $data->fetch(PDO::FETCH_ASSOC);

    $JSON_paivita_isannoitsija.= '{"id":"' .$rivi['isannoitsija_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Email":"' . $rivi['email'] . '", "Puhelin":"' . $rivi['puhelin'] . '", "Kayttaja_id":"' . $rivi['kayttaja_id'] . '"}]}';
        

    $yhteys = null;

    $handler = fopen("valittuIsannoitsija.json", "w");
    fwrite($handler, $JSON_paivita_isannoitsija);
    fclose($handler);
}

$yhteys = null;
header("location:../muokkaaIsannoitsia.php");

?>