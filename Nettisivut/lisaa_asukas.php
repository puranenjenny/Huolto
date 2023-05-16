<?php 
session_start(); //käynnistetään sessio
include "php/config.php"; //yhteys tietokantaan
include 'header_ui_toimisto.php';?> <!-- toimiston header -->

<head>
  <title>Asukkaan lisäys</title>
  <meta http-equiv="refresh" content="2;url=ui-naytakayttajat.php" />
</head>

<body>
  <div class="text-center container4 center">
    <?php
    try { //yritetään ottaa yhteys tietokantaan
      if (isset($_POST['submit'])) { //jos painetaan submit nappia

        // Otetaan lomakkeelta saadut tiedot talteen muuttujiin
        $etunimi = $_POST['etunimi'];//asukkaat taulu
        $sukunimi = $_POST['sukunimi'];//asukkaat taulu
        $tunnus = $_POST['tunnus'];//käyttäjät taulu
        $salasana = $_POST['salasana'];//käyttäjät taulu
        $kayttaja = "Asukas";//käyttäjät taulu (ei lomakkeelta, vaan aina sama arvo)
        $taloyhtio = $_POST['taloyhtio'];//asukkaat taulu
        $rappu = $_POST['rappu'];//asukkaat taulu

        // Aloita transaktio
        $yhteys->beginTransaction();

        //HOX! Lisäysjärjestyksellä väliä, että toimii koodi. 

         // Lisätään uusi käyttäjä tietokantaan kayttajat taululle
         $lisaa_kayttaja = $yhteys->prepare("INSERT INTO kayttajat (tunnus, salasana, kayttaja, rooli_id) VALUES (?, ?, ?, ?)");
         $kryptattu_salasana = password_hash($salasana, PASSWORD_DEFAULT); //kryptataan salasana
         $lisaa_kayttaja->execute([$tunnus, $kryptattu_salasana, $kayttaja, 4]);
 
         // Haetaan uuden käyttäjän id
         $kayttaja_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();

        // Lisätään uusi asukas tietokantaan asukkaat taululle hyödyntäen käyttäjän id:tä
        $lisaa_asukas = $yhteys->prepare("INSERT INTO asukkaat (etunimi, sukunimi, kayttaja_id, taloyhtio_id, rappu) VALUES (?, ?, ?, ?, ?)");
        $lisaa_asukas->execute([$etunimi, $sukunimi, $kayttaja_id, $taloyhtio, $rappu]);

         // Haetaan uuden asukkaan id
        $asukas_id = $yhteys->query("SELECT LAST_INSERT_ID()")->fetchColumn();
       

        // Sitoudutaan muutoksiin tietokannassa
        $yhteys->commit();

        // Näytetään onnistumisviesti
        echo "<h3>Asukkaan lisääminen onnistui!</h3>";

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
    <?php include "footer.php"; ?> <!-- footer -->
