<?php

require "config.php";

if(isset($_POST['tallenna'])){
    $tilanne =      $_POST['tilanne'];
    $tyontekija =   $_POST['tyontekija'];
    

    $JSON_paivita = file_get_contents("valittuVika.json");
    $users = json_decode($JSON_paivita, true);

        if(count($users) != 0){
            foreach($users as $key1){
                foreach($key1 as $user){
                    $tehtava_id = $user['ID'];
                    
                        $query = "UPDATE tehtavat SET tehtavan_tilanne_id = '$tilanne', tyontekija_id = '$tyontekija' WHERE tehtava_id  = '$tehtava_id'";
                        $change =  $yhteys->prepare($query);
                        $change->execute();
                }           
            }
        }

        header("location:../ui-uudet-ilmot.php");
    exit;
}

$yhteys = null;
?>