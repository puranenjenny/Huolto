<?php
require "config.php";

if(isset($_GET['id'])){
    $asukas_id = $_GET['id'];
    $query = "DELETE FROM asukkaat WHERE asukas_id=:asukas_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':asukas_id', $asukas_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-naytakayttajat.php");

?>