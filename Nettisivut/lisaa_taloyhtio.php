<?php 
session_start();
include "php/config.php"; 
include 'header_ui_toimisto.php';?>

<head>
  <title>Taloyhtiön lisäys</title>
  <meta http-equiv="refresh" content="2;url=ui-naytataloyhtiot.php" />
</head>

<body>
  <div class="text-center container4 center">
    <?php
    try {
      if (isset($_POST['submit'])) {
        // Otetaan lomakkeelta saadut tiedot talteen
        $osoite = $_POST['osoite'];//taloyhtiöt taulu
        $kaupunki = $_POST['kaupunki'];//taloyhtiöt taulu
        $postinumero = $_POST['postinumero'];//taloyhtiöt taulu
        $nimi = $_POST['nimi'];//taloyhtiöt taulu 
        $isannoitsija_id = $_POST['isannoitsija_id'];//taloyhtiöt taulu - saa olla myös NULL

        // Aloita transaktio
        $yhteys->beginTransaction();

        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 

        // Lisätään uusi taloyhtiö tietokantaan
        $lisaa_taloyhtio = $yhteys->prepare("INSERT INTO taloyhtiot (osoite, kaupunki, postinumero, nimi, isannoitsija_id) VALUES (?, ?, ?, ?, ?)");
        $lisaa_taloyhtio->execute([$osoite, $kaupunki, $postinumero, $nimi, $isannoitsija_id]);
        
        $taloyhtio_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();
       

        // Sitoudutaan muutoksiin tietokannassa
        $yhteys->commit();

        // Näytetään onnistumisviesti
        echo "<h3>Taloyhtiön lisääminen onnistui!</h3>";

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
