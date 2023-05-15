<?php
require "config.php";

if(isset($_GET['id'])){
    $kayttaja_id = $_GET['id'];

    $query = "DELETE FROM kayttajat WHERE kayttaja_id=:kayttaja_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':kayttaja_id', $kayttaja_id, PDO::PARAM_STR);
    $delete->execute();

    $query = "DELETE FROM isannoitsijat WHERE kayttaja_id=:kayttaja_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':kayttaja_id', $kayttaja_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-naytaisannoitsijat.php");

$yhteys = null;

?>