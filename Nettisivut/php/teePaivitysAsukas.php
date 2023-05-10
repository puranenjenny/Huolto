<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $Etunimi =      $_POST['Etunimi']; //<--'on nimi'
    $Sukunimi =     $_POST['Sukunimi'];
    $taloyhtio =    $_POST['taloyhtio'];
    $Rappu =        $_POST['Rappu'];
    

    $JSON_paivita = file_get_contents("valittuAsukas.json");
    $users = json_decode($JSON_paivita, true);

        if(count($users) != 0){
            foreach($users as $key1){
                foreach($key1 as $user){
                    $asukas_id = $user['id'];
                    
                        $query = "UPDATE asukkaat SET etunimi = '$Etunimi', sukunimi = '$Sukunimi', taloyhtio_id = '$taloyhtio', rappu = '$Rappu' WHERE asukas_id  = '$asukas_id'";
                        $change =  $yhteys->prepare($query);
                        $change->execute();
                }           
            }
        }

        header("location:../ui-naytakayttajat.php");
    exit;
}

$connection = null;
?>