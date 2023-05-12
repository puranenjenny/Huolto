<?php 
session_start();
include "php/config.php"; 
include 'header_ui_toimisto.php';?>

<head>
  <title>Isännöitsijän lisäys</title>
</head>

<body>
  <div class="text-center container4 center">
    <?php
    try {
      if (isset($_POST['submit'])) {
        // Otetaan lomakkeelta saadut tiedot talteen
        $etunimi = $_POST['etunimi'];//isannoitsijat taulu
        $sukunimi = $_POST['sukunimi'];//isannoitsijat taulu
        $email = $_POST['email'];//isannoitsijat taulu
        $puhelin = $_POST['puhelin'];//isannoitsijat taulu
        $tunnus = $_POST['tunnus'];//käyttäjät taulu
        $salasana = $_POST['salasana'];//käyttäjät taulu
        $kayttaja = "Isännöitsijä";//käyttäjät taulu
        //$taloyhtio = $_POST['taloyhtio'];//asukkaat taulu
        //$osoite = $_POST['osoite'];//asukkaat taulu
        //$kaupunki = $_POST['kaupunki'];//asukkaat taulu
        //$postinumero = $_POST['postinumero'];//asukkaat taulu
        //$osoite = $_POST['osoite'];//asukkaat taulu



        // Aloita transaktio
        $yhteys->beginTransaction();

        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 

         // Lisätään uusi käyttäjä tietokantaan
         $lisaa_isannoitsija = $yhteys->prepare("INSERT INTO kayttajat (tunnus, salasana, kayttaja, rooli_id) VALUES (?, ?, ?, ?)");
         $kryptattu_salasana = password_hash($salasana, PASSWORD_DEFAULT); //kryptataan salasana
         $lisaa_isannoitsija->execute([$tunnus, $kryptattu_salasana, $kayttaja, 3]);
 
         // Haetaan uuden käyttäjän id
         $kayttaja_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();

        // Lisätään uusi asukas tietokantaan
        $lisaa_isannoitsija = $yhteys->prepare("INSERT INTO isannoitsijat (etunimi, sukunimi, kayttaja_id, email, puhelin) VALUES (?, ?, ?, ?, ?)");
        $lisaa_isannoitsija->execute([$etunimi, $sukunimi, $kayttaja_id, $email, $puhelin]);

         // Haetaan uuden asukkaan id
        $isannoitsija_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();
       

        // Sitoudutaan muutoksiin tietokannassa
        $yhteys->commit();

        // Näytetään onnistumisviesti
        echo "<h3>Isännöitsijän lisääminen onnistui!</h3>";

      } else {
        echo "Lomaketta ei ole lähetetty.";
      }
    } catch(PDOException $e) {
        // Jos tulee virhe, perutaan transaktio ja näytetään virheilmoitus
        $yhteys->rollback();
        echo "Virhe: " . $e->getMessage();
     }

    // Suljetaan tietokantayhteys
    $yhteys = null;
    ?>
  </div>
</body>
    <?php include "footer.php"; ?>