<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $tila =      $_POST['tila']; //<--'on nimi'

    $JSON_paivita_taloyhtio = file_get_contents("valittuTaloyhtio.json");
    $users = json_decode($JSON_paivita_taloyhtio, true);
    
            if(count($users) != 0){
                foreach($users as $key1){
                    foreach($key1 as $user){
                        $taloyhtio_id = $user['ID'];

                        $yhteys->beginTransaction();

                        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 
                
                        // Lisätään uusi taloyhtiö tietokantaan
                        $lisaa_tila = $yhteys->prepare("INSERT INTO tilat (nimi, taloyhtio_id) VALUES (?, ?)");
                        $lisaa_tila->execute([$tila, $taloyhtio_id]);
                        // Sitoudutaan muutoksiin tietokannassa
                        $yhteys->commit();
                    
                }           
            }
        }

        header("location:tila_listaus.php");
    exit;
}

$connection = null;
?>
                    
        header("location:../lisaa_yleisiatiloja.php");
    exit;
    
$yhteys = null;
?>