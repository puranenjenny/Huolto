<?php //tämä tiedosto hakee käyttäjän id:n
include("config.php");

$tunnus = $_SESSION['login_user'];

$query = "SELECT kayttaja_id FROM kayttajat WHERE tunnus = :tunnus";
$data = $yhteys->prepare($query);
$data->bindParam(':tunnus', $tunnus);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);

$kayttaja_id = $result['kayttaja_id'];
?>