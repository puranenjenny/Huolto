<?php //tämä tiedosto tarkistaa onko käyttäjä kirjautunut sisään ja onko käyttäjällä oikea rooli
if (!isset($_SESSION)) {
    session_start();
}

// määritellään sallitut roolit kullekin sivulle
$allowed_roles = isset($allowed_roles) ? $allowed_roles : array();

// Check if 'rooli_id' is set in the session
if (!isset($_SESSION['rooli_id']) || !in_array($_SESSION['rooli_id'], $allowed_roles)) {
    // ohjataan käyttäjä etusivulle jos ei ole kirjautunut tai ei ole oikeaa roolia
    $log_msg = "Rooli ID: " . $_SESSION['rooli_id'] . PHP_EOL;
    $log_msg .= "Allowed Roles: " . implode(", ", $allowed_roles) . PHP_EOL;
    $log_msg .= "Redirecting to index.php" . PHP_EOL;
    file_put_contents('rooli_check.log', $log_msg, FILE_APPEND); //nämä on tarkoitettu debuggaamiseen
    header("Location: index.php");
    exit();
}
?>

