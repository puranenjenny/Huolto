<?php
require "config.php";

if(isset($_GET['tehtava_id'])){
    $tehtava_id = $_GET['tehtava_id'];
    $query = "DELETE FROM tehtavat WHERE tehtava_id=:tehtava_id";
    $delete = $yhteys->prepare($query);
    $delete->bindValue(':tehtava_id', $tehtava_id, PDO::PARAM_STR);
    $delete->execute();
}

header("location:../ui_toimisto.php");

?>