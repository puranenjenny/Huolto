<?php
require "config.php";

if(isset($_GET['id'])){
    $tyontekija_id = $_GET['id'];
    $query = "DELETE FROM isannoitsijat WHERE tyontekija_id = :tyontekija_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':tyontekija_id', $tyontekija_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-huoltohenkilot.php.php");

?>