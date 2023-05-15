<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $Nimi =             $_POST['Nimi']; //<--'on nimi'
    $Osoite =           $_POST['Osoite'];
    $Postinumero =      $_POST['Postinumero'];
    $Kaupunki =         $_POST['Kaupunki'];
    $isannoitsija_id =  $_POST['isannoitsija_id'];

    $JSON_paivita = file_get_contents("valittuTaloyhtio.json");
    $users = json_decode($JSON_paivita, true);

        if(count($users) != 0){
            foreach($users as $key1){
                foreach($key1 as $user){
                    $taloyhtio_id = $user['ID'];
                    
                        $query = "UPDATE taloyhtiot SET nimi = '$Nimi', osoite = '$Osoite', postinumero = '$Postinumero', kaupunki = '$Kaupunki', isannoitsija_id ='$isannoitsija_id' WHERE taloyhtio_id  = '$taloyhtio_id'";
                        $change =  $yhteys->prepare($query);
                        $change->execute();
                }           
            }
        }

        header("location:../ui-naytataloyhtiot.php");
    exit;
}

$yhteys = null;
?>