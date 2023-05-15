<?php 

require "config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $kysely = "DELETE FROM yhteydenottopyynnot WHERE yhteydenottopyynto_id=:id";
    $delete = $yhteys->prepare($kysely);
    $delete->bindValue(':id', $id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui-yhteydenotot.php");

$yhteys = null;

?>