<?php
// php code for fetchin data of selected person from the db for updatind screen
require "config.php";

if(isset($_GET['tehtava_id'])){
    $tehtava_id = $_GET['tehtava_id'];
    $query = "SELECT tehtavat.tehtava_id, tehtavat.kuvaus, taloyhtiot.osoite, tehtavat.yleisavaimen_kaytto, tehtavat.numero, tehtavan_tilanne.tehtavan_tilanne, tehtavat.tyontekija_id, tehtavat.jatetty 
    FROM tehtavat
    INNER JOIN taloyhtiot ON taloyhtiot.taloyhtio_id = tehtavat.taloyhtio_id
    INNER JOIN tehtavan_tilanne ON tehtavan_tilanne.tehtavan_tilanne_id = tehtavat.tehtavan_tilanne_id
    INNER JOIN tyontekijat ON tyontekijat.tyontekija_id = tehtavat.tyontekija_id
    WHERE tehtava_id = '$tehtava_id'";
    $data = $yhteys->query($query);
    
    $JSON_paivita = '{"tehtavat":[';
    $row = $data->fetch(PDO::FETCH_ASSOC);

    $JSON_paivita.= '{"ID":"'.$row['tehtava_id'].'","Viankuvaus":"'.$row['kuvaus'].'","Osoite":"'.$row['osoite'].'","Yleisavain":"'.$row['yleisavaimen_kaytto'].'","Puhelin":"'.$row['numero'].'","Tilanne":"'.$row['tehtavan_tilanne'].'","Tyontekija":"'.$row['tyontekija_id'].'","Paivays":"'.$row['jatetty'].'"}';
        
    $JSON_paivita.=']}';
    $yhteys = null;

    $handler = fopen("valittuVika.json", "w");
    fwrite($handler, $JSON_paivita);
    fclose($handler);
}
    //for testing purposes  

    //echo $row['tehtava_id']." " .$row['kuvaus']." " .$row['osoite']." ".$row['yleisavaimen_kaytto']." ".$row['numero']." ".$row['tehtavan_tilanne']." ".$row['tyontekija_id']." ".$row['jatetty'];
$yhteys = null;
header("location:../muokkaaVika.php");

?>