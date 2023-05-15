<?php

require "config.php";

if(isset($_GET['id'])){
    $tyontekija_id = $_GET['id'];
    $query = "SELECT tyontekijat.tyontekija_id, tyontekijat.etunimi, tyontekijat.sukunimi, tyontekijat.email, tyontekijat.kayttaja_id, tyontekijat.puhelin, tyontekijat.tyontekijan_tilanne_id, tyontekijan_tilanne.tyontekijan_tilanne, kayttajat.rooli_id, roolit.rooli, tyontekijat.kayttaja_id
    FROM tyontekijat
    INNER JOIN tyontekijan_tilanne ON tyontekijan_tilanne.tyontekijan_tilanne_id = tyontekijat.tyontekijan_tilanne_id
    INNER JOIN kayttajat ON kayttajat.kayttaja_id = tyontekijat.kayttaja_id
    INNER JOIN roolit ON roolit.rooli_id = kayttajat.rooli_id
    WHERE tyontekija_id = '$tyontekija_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita_tyontekija = '{"Tyontekija":[';
    $rivi = $data->fetch(PDO::FETCH_ASSOC);

     $JSON_paivita_tyontekija.= '{"id":"' .$rivi['tyontekija_id'] . '", "Etunimi":"' . $rivi['etunimi'] . '", "Sukunimi":"' . $rivi['sukunimi'] . '", "Email":"' . $rivi['email'] . '", "Kayttaja_id":"' . $rivi['kayttaja_id'] . '", "Puhelin":"' . $rivi['puhelin'] . '", "Tilanne-id":"' . $rivi['tyontekijan_tilanne_id'] . '", "Tilanne":"' . $rivi['tyontekijan_tilanne'] . '", "rooli-id":"' . $rivi['rooli_id'] . '", "rooli":"' . $rivi['rooli'] . '", "Kayttaja_id":"' . $rivi['kayttaja_id'] . '"}]}';
        

    $yhteys = null;

    $handler = fopen("valittuTyontekija.json", "w");
    fwrite($handler,  $JSON_paivita_tyontekija);
    fclose($handler);
}

$yhteys = null;
header("location:../muokkaaTyontekija.php");

?>