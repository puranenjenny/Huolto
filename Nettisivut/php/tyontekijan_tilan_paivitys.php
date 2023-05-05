<?php 
include("config.php");
include("hae_kayttajaid.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

$kayttaja_id = $result['kayttaja_id'];
print_r($kayttaja_id);

$sql = "SELECT tyontekijan_tilanne_id FROM tyontekijat WHERE kayttaja_id = :kayttaja_id";

$paivita = $yhteys->prepare($sql);
$paivita->bindParam(':kayttaja_id', $kayttaja_id);
$paivita->execute();

//Haetaan tietokannasta työntekijän tilanne ID

$row = $paivita->fetch(PDO::FETCH_ASSOC);
$tyontekijan_tilanne_id = $row["tyontekijan_tilanne_id"];

//Näytetään checkboxin tila käyttäen haettua tietokannan arvoa
$is_checked = ($tyontekijan_tilanne_id == 2) ? "checked" : "";

echo "<input type='checkbox' name='tyontekijan_tilanne' value='2' $is_checked>";

//Päivitetään tietokannan arvo kun checkboxia klikataan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tyontekijan_tilanne_id = ($_POST["tyontekijan_tilanne_id"] == 2) ? 2 : 1;

    $sql = "UPDATE tyontekijat SET tyontekijan_tilanne_id = :tyontekijan_tilanne_id WHERE kayttaja_id = :kayttaja_id";

    $paivita = $yhteys->prepare($sql);
    $paivita->bindParam(':tyontekijan_tilanne_id', $tyontekijan_tilanne_id);
    $paivita->bindParam(':kayttaja_id', $kayttaja_id);

    if ($paivita->execute()) {
        echo "Updated successfully!";
    } else {
        echo "Error updating record: ";
        print_r($paivita->errorInfo());
    }
}