<?php
include("config.php");

if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
session_start(); 
}

   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $tunnus = $_POST['tunnus'];
      $salasana = $_POST['salasana']; 
      
      $kirjaudu = $yhteys->prepare("SELECT kayttaja_id FROM kayttajat WHERE tunnus = :tunnus and salasana = :salasana");
      $kirjaudu->bindParam(':tunnus', $tunnus);
      $kirjaudu->bindParam(':salasana', $salasana);
      $kirjaudu->execute();
      
      $count = $kirjaudu->rowCount();
		
      if($count == 1) {
         $_SESSION['login_user'] = $tunnus;
         header("location: ../vikalomake_isannoitsija.php"); //siirrytään vikailmoitukseen/työpöydälle
      }else {
         $_SESSION['error'] = "<b>Kirjautuminen ei onnistunut!<br> 
         Tarvittaessa ota yhteys toimistoomme toimisto@rautio.fi</b>"; //errorviesti jos kirjautuminen ei onnistu
         header("location: ../kirjaudu_asukas.php");
      }
   }

?>