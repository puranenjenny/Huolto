<?php
include("config.php");

if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
  session_start(); 
}

   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $tunnus = $_POST['tunnus'];
      $salasana = $_POST['salasana']; 
      
      $kirjaudu = $yhteys->prepare("SELECT kayttaja_id, rooli_id FROM kayttajat WHERE tunnus = :tunnus and salasana = :salasana");
      $kirjaudu->bindParam(':tunnus', $tunnus);
      $kirjaudu->bindParam(':salasana', $salasana);
      $kirjaudu->execute();

$count = $kirjaudu->rowCount();

if($count == 1) {
   $kayttaja = $kirjaudu->fetch();
   $_SESSION['login_user'] = $tunnus;

   if($kayttaja['rooli_id'] == '1') { // 1=toimistohenkilo, 2=huoltohenkilo, 3=isannoitsija, 4=asukas
     header("location: ../ui_toimisto.php"); //siirrytään työpöydille
   } elseif($kayttaja['rooli_id'] == '2') {
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
