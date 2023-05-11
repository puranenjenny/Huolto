<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $Etunimi =      $_POST['Etunimi']; //<--'on nimi'
    $Sukunimi =     $_POST['Sukunimi'];
    $Email =        $_POST['Email'];
    $Puhelin =      $_POST['Puhelin'];
    

    $JSON_paivita = file_get_contents("valittuIsannoitsija.json");
    $users = json_decode($JSON_paivita, true);

        if(count($users) != 0){
            foreach($users as $key1){
                foreach($key1 as $user){
                    $isannoitsija_id = $user['id'];
                    
                        $query = "UPDATE isannoitsijat SET etunimi = '$Etunimi', sukunimi = '$Sukunimi', email = '$Email', puhelin = '$Puhelin' WHERE 	isannoitsija_id  = '$isannoitsija_id'";
                        $change =  $yhteys->prepare($query);
                        $change->execute();
                }           
            }
        }

        header("location:../ui-naytaisannoitsijat.php");
    exit;
}

$connection = null;
?>