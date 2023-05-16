<?php //tämä tiedosto tarkistaa onko käyttäjä kirjautunut sisään ja onko käyttäjällä oikea rooli
if (!isset($_SESSION)) { //jos session ei ole käynnissä, käynnistä se
    session_start();
}

// määritellään sallitut roolit kullekin sivulle
$allowed_roles = isset($allowed_roles) ? $allowed_roles : array();

// tarkistetaan onko käyttäjä kirjautunut sisään ja onko käyttäjällä oikea rooli
if (!isset($_SESSION['rooli_id']) || !in_array($_SESSION['rooli_id'], $allowed_roles)) {
    // ohjataan käyttäjä etusivulle jos ei ole kirjautunut tai ei ole oikeaa roolia
    header("Location: index.php"); //ohjataan käyttäjä etusivulle
    exit(); //lopetetaan tämän tiedoston suoritus
}
?>

