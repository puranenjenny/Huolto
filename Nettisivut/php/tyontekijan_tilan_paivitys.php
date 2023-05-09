<?php 
include("config.php");
include("hae_kayttajaid.php");

$kayttaja_id = $result['kayttaja_id']; // hae_kayttajaid.phpsta 

if ($_SERVER["REQUEST_METHOD"] == "POST") { // jos POST nappia on painettu (eli työntekijän tilaa on muutettu)
    $sql = "SELECT tyontekijan_tilanne_id FROM tyontekijat WHERE kayttaja_id = :kayttaja_id"; // hae työntekijän tila
    $query = $yhteys->prepare($sql);
    $query->bindParam(':kayttaja_id', $kayttaja_id); 
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($row) { // jos työntekijän tila löytyy
        $current_tyontekijan_tilanne_id = $row["tyontekijan_tilanne_id"]; // tallenna työntekijän tila muuttujaan
        $new_tyontekijan_tilanne_id = ($current_tyontekijan_tilanne_id == 1) ? 2 : 1; // jos työntekijän tilanne on 1, muuta se 2:ksi ja päinvastoin
    } else { 
        $new_tyontekijan_tilanne_id = 1;
    }

    $sql = "UPDATE tyontekijat SET tyontekijan_tilanne_id = :tyontekijan_tilanne_id WHERE kayttaja_id = :kayttaja_id"; // päivitä työntekijän tila
    $paivita = $yhteys->prepare($sql);
    $paivita->bindParam(':tyontekijan_tilanne_id', $new_tyontekijan_tilanne_id);
    $paivita->bindParam(':kayttaja_id', $kayttaja_id);

    if ($paivita->execute()) { // jos päivitys onnistuu
        echo $new_tyontekijan_tilanne_id; // palauta uusi työntekijän tila
    } else {
        echo "Error updating record: "; // jos päivitys ei onnistu
        print_r($paivita->errorInfo()); // tulosta virheilmoitus
    }
}
?>
