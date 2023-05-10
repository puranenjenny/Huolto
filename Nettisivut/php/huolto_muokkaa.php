<?php
require_once "config.php";

$tyontekija_id = $_POST['tyontekija_id'];
$tehtavan_tilanne_id = $_POST['tehtavan_tilanne_id'];
$korjaustoimenpide = $_POST['korjaustoimenpide'];
$tehtava_id = $_POST['tehtava_id'];

try {
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE tehtavat SET korjaustoimenpide = :korjaustoimenpide, tyontekija_id = :tyontekija_id, tehtavan_tilanne_id = :tehtavan_tilanne_id WHERE tehtava_id = :tehtava_id";

    $data = $yhteys->prepare($sql);
    $data->bindParam(':korjaustoimenpide', $korjaustoimenpide);
    $data->bindParam(':tyontekija_id', $tyontekija_id, PDO::PARAM_INT);
    $data->bindParam(':tehtavan_tilanne_id', $tehtavan_tilanne_id, PDO::PARAM_INT);
    $data->bindParam(':tehtava_id', $tehtava_id, PDO::PARAM_INT);

    $data->execute();

    echo "Tehtävä päivitetty onnistuneesti!";
} catch (PDOException $e) {
    echo "Virhe: " . $e->getMessage();
}

$yhteys = null;

?>
