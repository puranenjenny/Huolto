<?php
require "config.php";

if(isset($_GET['id'])){
    $isannoitsija_id = $_GET['id'];
    $query = "DELETE FROM isannoitsijat WHERE isannoitsija_id=:isannoitsija_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':isannoitsija_id', $isannoitsija_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-naytaisannoitsijat.php");

?>