<?php

include("config.php");

if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
  session_start(); 
}

   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $tunnus = $_POST['tunnus'];
      $salasana = $_POST['salasana']; 

      $kirjaudu = $yhteys->prepare("SELECT kayttajat.kayttaja_id, kayttajat.rooli_id, tyontekijat.tyontekija_id FROM kayttajat 
      INNER JOIN tyontekijat ON kayttajat.kayttaja_id = tyontekijat.kayttaja_id
      WHERE kayttajat.tunnus = :tunnus AND kayttajat.salasana = :salasana");//!!!muutettu kyselyä
      $kirjaudu->bindParam(':tunnus', $tunnus);
      $kirjaudu->bindParam(':salasana', $salasana);
      $kirjaudu->execute();

$count = $kirjaudu->rowCount();

$tyontekija_id = null; // !!!!alustetaan $tyontekija_id-muuttuja, jotta se on varmasti olemassa myöhemmin


if($count == 1) {
  $kayttaja = $kirjaudu->fetch();
  $_SESSION['login_user'] = $tunnus;
  $_SESSION['rooli_id'] = $kayttaja['rooli_id']; //---tallennetaan myös rooli_id sessioon

  if($kayttaja['rooli_id'] == '1') { // 1=toimistohenkilo, 2=huoltohenkilo, 3=isannoitsija, 4=asukas
    // echo "Rooli ID: " . $_SESSION['rooli_id'] . "<br>";
    // echo "Redirecting to: " . "desired_page" . "<br>";
    // exit;
    header("location: ../ui-uudet-ilmot.php"); //siirrytään työpöydille
  } elseif($kayttaja['rooli_id'] == '2') {
    $tyontekija_id = $kayttaja['tyontekija_id']; //!!!! haetaan työntekijän id
    $_SESSION['tyontekija_id'] = $tyontekija_id; //!!!! tallenna työntekijän id sessioon
    header("location: ../ui_huolto.php");
  } else {
    $_SESSION['error'] = "<b>Kirjautuminen ei onnistunut!<br>  
    Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>"; //errorviesti jos kirjautuminen ei onnistu
    header("location: ../kirjaudu_tyontekija.php");
  }
} else {
  $_SESSION['error'] = "<b>Kirjautuminen ei onnistunut!<br> 
  Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>";
  header("location: ../kirjaudu_tyontekija.php");
}
}
?>

