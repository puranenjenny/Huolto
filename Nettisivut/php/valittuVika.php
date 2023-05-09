<?php

require "config.php";

if(isset($_GET['tehtava_id'])){
    $tehtava_id = $_GET['tehtava_id'];
    $query = "SELECT tehtavat.tehtava_id, tehtavat.kuvaus, taloyhtiot.osoite, tehtavat.yleisavaimen_kaytto, tehtavat.numero, tehtavat.tehtavan_tilanne_id, tehtavan_tilanne.tehtavan_tilanne, tehtavat.tyontekija_id, tehtavat.jatetty 
    FROM tehtavat
    INNER JOIN taloyhtiot ON taloyhtiot.taloyhtio_id = tehtavat.taloyhtio_id
    INNER JOIN tehtavan_tilanne ON tehtavan_tilanne.tehtavan_tilanne_id = tehtavat.tehtavan_tilanne_id
    INNER JOIN tyontekijat ON tyontekijat.tyontekija_id = tehtavat.tyontekija_id
    WHERE tehtava_id = '$tehtava_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita = '{"tehtavat":[';
    $row = $data->fetch(PDO::FETCH_ASSOC);

    $JSON_paivita.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Osoite":"'.$row['osoite'].'","Yleisavain":"'.$row['yleisavaimen_kaytto'].'","Puhelin":"'.$row['numero'].'","TilaID":"'.$row['tehtavan_tilanne_id'].'","Tilanne":"'.$row['tehtavan_tilanne'].'","Tyontekija":"'.$row['tyontekija_id'].'","Paivays":"'.$row['jatetty'].'"}';
        
    $JSON_paivita.=']}';
    $yhteys = null;

    $handler = fopen("valittuVika.json", "w");
    fwrite($handler, $JSON_paivita);
    fclose($handler);
}

$yhteys = null;
header("location:../muokkaaVika.php");

?>