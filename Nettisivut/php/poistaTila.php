<?php
require "config.php";

if(isset($_GET['id'])){
    $tila_id = $_GET['id'];
    $query = "DELETE FROM tilat WHERE tila_id = :tila_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':tila_id', $tila_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:tila_listaus.php");

?>