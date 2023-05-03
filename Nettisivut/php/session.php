<?php
include('config.php');

if(!isset($_SESSION)){  //jos session ei ole jo käynnissä, käynnistä se
session_start(); 
}

$user_check = $_SESSION['login_user'];

$pdo = new PDO("mysql:host=$palvelin; dbname=$tietokanta", $tunnus, $salasana);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT tunnus FROM kayttajat WHERE tunnus = :user_check";
$kirjaudu = $pdo->prepare($sql);
$kirjaudu->execute(['user_check' => $user_check]);

$row = $kirjaudu->fetch(PDO::FETCH_ASSOC);

$login_session = $row['tunnus'];

   if(!isset($_SESSION['login_user'])){
      header("location: asukas_kirjautuskoodi.php");
      die();
   }
?>