<?php //haetaan isännöitsijän nimi tietokannasta
include("config.php");

$tunnus = $_SESSION['login_user'];
$etunimi = "";
$sukunimi = "";

$query = "SELECT kayttaja_id FROM kayttajat WHERE tunnus = :tunnus";
$data = $yhteys->prepare($query);
$data->bindParam(':tunnus', $tunnus);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);
$kayttaja_id = $result['kayttaja_id'];

$query2 = "SELECT etunimi, sukunimi FROM isannoitsijat WHERE kayttaja_id = :kayttaja_id";
$data2 = $yhteys->prepare($query2);
$data2->bindParam(':kayttaja_id', $kayttaja_id);
$data2->execute();
$result2 = $data2->fetch(PDO::FETCH_ASSOC);

if ($result2) {
  $etunimi = $result2['etunimi'];
  $sukunimi = $result2['sukunimi'];
}
?>