<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $Etunimi =      $_POST['Etunimi']; //<--'on nimi'
    $Sukunimi =     $_POST['Sukunimi'];
    $Email =        $_POST['Email'];
    $Puhelin =      $_POST['Puhelin'];
    $tilanne =      $_POST['Tilanne-id'];
    $rooli_id =      $_POST['rooli-id'];

    $JSON_paivita = file_get_contents("valittuTyontekija.json");
    $users = json_decode($JSON_paivita, true);

        if(count($users) != 0){
            foreach($users as $key1){
                foreach($key1 as $user){
                    $tyontekija_id = $user['id'];
                    $kayttaja_id = $user['Kayttaja_id'];


                    
                        $query = "UPDATE tyontekijat SET etunimi = '$Etunimi', sukunimi = '$Sukunimi', email = '$Email', puhelin = '$Puhelin', tyontekijan_tilanne_id ='$tilanne' WHERE tyontekija_id  = '$tyontekija_id'";
                        $change =  $yhteys->prepare($query);
                        $change->execute();

                        $query2 = "UPDATE kayttajat SET rooli_id = '$rooli_id' WHERE kayttaja_id  = '$kayttaja_id'";
                        $change2 =  $yhteys->prepare($query2);
                        $change2->execute();
                }           
            }
        }

        header("location:../ui-huoltohenkilot.php");
    exit;
}

$yhteys = null;
?>