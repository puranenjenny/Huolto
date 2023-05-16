<?php //isännöitsijän kirjautuminen
include("config.php");

if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
  session_start(); 
}

   if($_SERVER["REQUEST_METHOD"] == "POST") { //jos lomake on lähetetty, käsitellään tiedot
      
      $tunnus = $_POST['tunnus']; //tallennetaan lomakkeelta tulleet tiedot muuttujiin
      $salasana = $_POST['salasana']; 
      
      $kirjaudu = $yhteys->prepare("SELECT kayttaja_id, rooli_id, salasana FROM kayttajat WHERE tunnus = :tunnus"); //valmistellaan kysely
      $kirjaudu->bindParam(':tunnus', $tunnus); //sidotaan muuttuja kyselyyn
      $kirjaudu->execute(); //ajetaan kysely

      $count = $kirjaudu->rowCount(); //lasketaan montako riviä kysely palautti

      if($count == 1) { //jos kysely palautti yhden rivin, eli tunnus löytyi
         $kayttaja = $kirjaudu->fetch(); //tallennetaan käyttäjän tiedot taulukkoon
         if(password_verify($salasana, $kayttaja['salasana'])) { //tarkistetaan salasana
            if($kayttaja['rooli_id'] == '3') { // 1=toimistohenkilo, 2=huoltohenkilo, 3=isannoitsija, 4=asukas
               $_SESSION['login_user'] = $tunnus; //tallennetaan käyttäjän tunnus sessioon
               $_SESSION['rooli_id'] = $kayttaja['rooli_id']; //tallennetaan myös rooli_id sessioon
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