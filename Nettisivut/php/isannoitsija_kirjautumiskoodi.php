<?php
include("config.php");

if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
  session_start(); 
}

   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $tunnus = $_POST['tunnus'];
      $salasana = $_POST['salasana']; 
      
      $kirjaudu = $yhteys->prepare("SELECT kayttaja_id, rooli_id, salasana FROM kayttajat WHERE tunnus = :tunnus");
      $kirjaudu->bindParam(':tunnus', $tunnus);
      $kirjaudu->execute();

      $count = $kirjaudu->rowCount();

      if($count == 1) {
         $kayttaja = $kirjaudu->fetch();
         if(password_verify($salasana, $kayttaja['salasana'])) { //tarkistetaan salasana
            if($kayttaja['rooli_id'] == '3') { // 1=toimistohenkilo, 2=huoltohenkilo, 3=isannoitsija, 4=asukas
               $_SESSION['login_user'] = $tunnus;
               $_SESSION['rooli_id'] = $kayttaja['rooli_id']; //---tallennetaan myös rooli_id sessioon
               header("location: ../vikalomake_isannoitsija.php"); //siirrytään vikailmoitukseen
            } else {
               $_SESSION['error'] = "<b>Tunnus tai salasana on väärin!<br> 
               Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>"; //errorviesti jos kirjautuminen ei onnistu
               header("location: ../kirjaudu_isannoitsija.php");
            }
         } else {
            $_SESSION['error'] = "<b>Tunnus tai salasana on väärin!<br> 
            Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>"; //errorviesti jos kirjautuminen ei onnistu
            header("location: ../kirjaudu_isannoitsija.php");
         }
      } else {
         $_SESSION['error'] = "<b>Kirjautuminen ei onnistunut!<br> 
         Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>"; //errorviesti jos kirjautuminen ei onnistu
         header("location: ../kirjaudu_isannoitsija.php");
      }
      }

?>