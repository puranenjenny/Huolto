<?php //tämä tiedosto tarkistaa onko käyttäjä kirjautunut sisään ja onko käyttäjällä oikea rooli
if (!isset($_SESSION)) {
    session_start();
}

// määritellään sallitut roolit kullekin sivulle
$allowed_roles = isset($allowed_roles) ? $allowed_roles : array();

if (!isset($_SESSION['tunnus']) || !in_array($_SESSION['rooli_id'], $allowed_roles)) {
    // ohjataan käyttäjä kirjautumissivulle jos ei ole kirjautunut tai ei ole oikeaa roolia
    header("Location: index.php");
    exit();
}
?>
