<?php 
session_start();
include "config.php";
include "../header.php";
?>

<head>
  <title>lisäys</title>
</head>

<body>
  <div class="text-center container4 center">
    <?php
    try {
      if (isset($_POST['submit'])) {
        // Otetaan lomakkeelta saadut tiedot talteen
        $etunimi = $_POST['etunimi'];//asukkaat taulu
        $sukunimi = $_POST['sukunimi'];//asukkaat taulu
        $osoite = $_POST['osoite'];//taloyhtiöt taulu
        $kaupunki = $_POST['kaupunki'];//taloyhtiöt taulu
        $postinumero = $_POST['postinumero'];//taloyhtiöt taulu
        $taloyhtio = $_POST['taloyhtio'];//taloyhtiöt taulu=nimi
        $tunnus = $_POST['tunnus'];//käyttäjät taulu
        $salasana = $_POST['salasana'];//käyttäjät taulu
        $kayttaja = $_POST['kayttaja'];//käyttäjät taulu
        $isannoitsija_id = null;

        // Aloita transaktio
        $yhteys->beginTransaction();

        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 

         // Lisätään uusi käyttäjä tietokantaan
         $lisaa_kayttaja = $yhteys->prepare("INSERT INTO kayttajat (tunnus, salasana, kayttaja, rooli_id) VALUES (?, ?, ?, ?)");
         $lisaa_kayttaja->execute([$tunnus, $salasana, $kayttaja, 4]);
 
         // Haetaan uuden käyttäjän id
         $kayttaja_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();

        // Lisätään uusi asukas tietokantaan
        $lisaa_asukas = $yhteys->prepare("INSERT INTO asukkaat (etunimi, sukunimi, kayttaja_id) VALUES (?, ?, ?)");
        $lisaa_asukas->execute([$etunimi, $sukunimi, $kayttaja_id]);

         // Haetaan uuden asukkaan id
        $asukas_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();

        // Lisätään uusi taloyhtiö tietokantaan
        $lisaa_taloyhtio = $yhteys->prepare("INSERT INTO taloyhtiot (osoite, kaupunki, postinumero, nimi, kayttaja_id) VALUES (?, ?, ?, ?, ?)");
        $lisaa_taloyhtio->execute([$osoite, $kaupunki, $postinumero, $taloyhtio, $kayttaja_id]);
        
        $taloyhtio_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();
       

        // Sitoudutaan muutoksiin tietokannassa
        $yhteys->commit();

        // Näytetään onnistumisviesti
        echo "Asukkaan lisääminen onnistui!";

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

    <?php include "../footer.php"; ?>
  </div>
</body>