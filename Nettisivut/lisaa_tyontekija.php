<?php 
session_start();
include "php/config.php"; 
include 'header_ui_toimisto.php';?>

<head>
  <title>Asukkaan lisäys</title>
</head>

<body>
  <div class="text-center container4 center">
    <?php
    try {
      if (isset($_POST['submit'])) {
        // Otetaan lomakkeelta saadut tiedot talteen
        $etunimi = $_POST['etunimi'];//tyontekijat taulu
        $sukunimi = $_POST['sukunimi'];//tyontekijat taulu
        $puhelin = $_POST['puhelin'];//tyontekijat taulu
        $email = $_POST['email'];//tyontekijat taulu
        $tunnus = $_POST['tunnus'];//käyttäjät taulu
        $salasana = $_POST['salasana'];//käyttäjät taulu
        $kayttaja = "Työntekijä";//käyttäjät taulu
        $tyontekijan_tilanne_id = 1;
        $rooli_id = $_POST['rooli_id'];//käyttäjät taulu

        
        // Aloita transaktio
        $yhteys->beginTransaction();

        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 

         // Lisätään uusi käyttäjä tietokantaan
         $lisaa_tyontekija = $yhteys->prepare("INSERT INTO kayttajat (tunnus, salasana, kayttaja, rooli_id) VALUES (?, ?, ?, ?)");
         $lisaa_tyontekija->execute([$tunnus, $salasana, $kayttaja, $rooli_id]);
 
         // Haetaan uuden käyttäjän id
         $kayttaja_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();

        // Lisätään uusi tyontekija tietokantaan
        $lisaa_tyontekija = $yhteys->prepare("INSERT INTO tyontekijat (etunimi, sukunimi, kayttaja_id, puhelin, email, tyontekijan_tilanne_id) VALUES (?, ?, ?, ?, ?, ?)");
        $lisaa_tyontekija->execute([$etunimi, $sukunimi, $kayttaja_id, $puhelin, $email, $tyontekijan_tilanne_id]);

         // Haetaan uuden tyontekijan id
        $tyontekija_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();
       

        // Sitoudutaan muutoksiin tietokannassa
        $yhteys->commit();

        // Näytetään onnistumisviesti
        echo "<h3>Työntekijän lisääminen onnistui!</h3>";

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
