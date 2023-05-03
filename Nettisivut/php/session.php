<?php
include('config.php');

if(!isset($_SESSION)){  //jos session ei ole jo käynnissä, käynnistä se
session_start(); 
}

if (isset($_SESSION['login_user'])) {
    $user_check = $_SESSION['login_user'] ?? ''; // ?? '' lisätään tyhjä string jos login_user on tyhjä
} else {
    $user_check = '';
}

$pdo = new PDO("mysql:host=$palvelin; dbname=$tietokanta", $tunnus, $salasana);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT tunnus FROM kayttajat WHERE tunnus = :user_check";
$kirjaudu = $pdo->prepare($sql);
$kirjaudu->execute(['user_check' => $user_check]);

$row = $kirjaudu->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $login_session = $row['tunnus'];
} else {
    $login_session = '';
}


if(!isset($_SESSION['login_user'])){
header("location: asukas_kirjautumiskoodi.php");
die();
}
?>