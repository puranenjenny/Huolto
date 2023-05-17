<?php
require "config.php";

if(isset($_GET['id'])){
    $taloyhtio_id = $_GET['id'];

    $query = "DELETE asukkaat, kayttajat FROM asukkaat
              INNER JOIN kayttajat ON kayttajat.kayttaja_id = asukkaat.kayttaja_id
              WHERE taloyhtio_id = :taloyhtio_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':taloyhtio_id', $taloyhtio_id, PDO::PARAM_STR);
    $delete->execute();

    $query = "DELETE FROM tehtavat WHERE taloyhtio_id = :taloyhtio_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':taloyhtio_id', $taloyhtio_id, PDO::PARAM_STR);
    $delete->execute();

    $query = "DELETE FROM tilat WHERE taloyhtio_id = :taloyhtio_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':taloyhtio_id', $taloyhtio_id, PDO::PARAM_STR);
    $delete->execute();

    $query = "DELETE FROM taloyhtiot WHERE taloyhtio_id = :taloyhtio_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':taloyhtio_id', $taloyhtio_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-naytataloyhtiot.php");

$yhteys = null;

?>