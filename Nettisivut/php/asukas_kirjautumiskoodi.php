<?php require "config.php"; //yhdistys tietokantaan config tiedoston avulla HUOM ../ alku ?>

<?php 
if(isset($_SESSION['tunnus'])){ //tarkistetaan onko käyttäjä kirjautunut sisään, eli onko sessiossa jo tunnus
  header("location: ../index.php"); //jos käyttäjä on kirjautunut sisään, niin ohjataan käyttäjä etusivulle
 }

  if(isset($_POST['Kirjaudu'])){ //tarkistetaan onko kirjaudu nappi painettu
    if($_POST['tunnus'] == "" OR $_POST['salasana'] == ""){ //tarkistetaan onko kentät tyhjiä
      echo "Täytä kaikki tarvittavat tiedot!"; //jos kentät ovat tyhjiä, niin tulostetaan virheilmoitus
    }else{ //jos kentät eivät ole tyhjiä, niin suoritetaan alla oleva koodi
      $tunnus = $_POST['tunnus']; 
      $salasana = $_POST['salasana'];

      $komento = "SELECT * FROM kayttajat WHERE tunnus = '$tunnus'"; //haetaan tietokannasta käyttäjätunnus
      $kirjaudu = $yhteys->prepare($komento); //valmistellaan kysely "komento"
      $kirjaudu->execute();
      $data = $kirjaudu->fetch(PDO::FETCH_ASSOC); //haetaan tietokannasta käyttäjätunnus data muuttujaan

      if($kirjaudu->rowCount() > 0){ //rowcount on yli 0, niin käyttäjätunnus on olemassa
        if(password_verify($salasana, $data['salasana'])){ //tarkistetaan onko salasana oikein, jos on oikein, niin suoritetaan alla oleva koodi
          echo "Kirjautuminen onnistui!"; //jos salasana on oikein, niin tulostetaan ilmoitus

            $_SESSION['tunnus'] = $data['tunnus']; //tallennetaan sessioon käyttäjätunnus
            header("location: ../index.php"); //ohjataan käyttäjä etusivulle header komennolla


        }else{
          echo "Tunnus ja tai salasana on väärin!"; //jos salasana on väärin, niin tulostetaan virheilmoitus
        }
    }else {
      echo "Käyttäjätunnusta ei löydy!"; //jos käyttäjätunnusta ei löydy, niin tulostetaan virheilmoitus
    }
    }
  }

?>

