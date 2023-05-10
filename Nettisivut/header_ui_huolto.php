<?php include 'php/session.php';
include 'php/config.php';
include 'php/hae_kayttajaid.php';?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mira Hosio, Antti Kortelainen, Jenny Puranen">

    <!--Välilehden logo-->    
    <link rel="icon" href="img/logo_small2.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <!-- Fontit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,500&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!--Oma CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/nappi_ylos.js"></script>
    <script src="js/tyontekijan_tilanne.js"></script>

    <title>Työntekijän näkymä</title>
   

<?php
// haetaan työntekijän tilanne kirjautuneelta käyttäjältä
$tyontekijan_tilanne_query = $yhteys->prepare("SELECT tyontekijan_tilanne_id FROM tyontekijat WHERE kayttaja_id = :kayttaja_id");
$tyontekijan_tilanne_query->bindParam(':kayttaja_id', $kayttaja_id);
$tyontekijan_tilanne_query->execute();
$tyontekijan_tilanne_result = $tyontekijan_tilanne_query->fetch(PDO::FETCH_ASSOC);

if ($tyontekijan_tilanne_result) { // jos työntekijän tilanne löytyy
    $tyontekijan_tilanne = $tyontekijan_tilanne_result['tyontekijan_tilanne_id']; // asetetaan se muuttujaan
} else {
    // Jos työntekijän tilannetta ei löydy, asetetaan se oletuksena vapaaksi
    $tyontekijan_tilanne = 1;
}

// määritetään napin teksti työntekijän tilan mukaan
$button_text = ($tyontekijan_tilanne == 1) ? "VAPAA" : "VARATTU";
?>
  </head>
  <body class="justify-content-center"> 
    

<div class="container-fluid">
<div class="row mx-0">
    <div class="ylapalkki d-block d-md-flex">
        <div class="col-12 col-md-3 col-lg-2 minikuva1"><img class="puhelin minikuva" src="img/puhelin.png" alt="puhelin">09 4545 669</div>
        <div class="col-12 col-md-3 col-lg-2"><img class="sijainti minikuva" src="img/sijainti.png" alt="sijainti">Sofiankatu 4</div>
        <div class="col-12 col-md-3 col-lg-2"><img class="email minikuva" src="img/email.png" alt="email">toimisto@rautio.fi</div>
        <div class="d-none d-lg-block col-lg-4"></div>
        <div class="col-12 col-md-12 col-lg-2 d-flex align-items-center justify-content-end"> 
          <div> <!-- Työntekijän tilanne -nappi -->
          <button class="btn btn2 btn-info" id="tyontekijan_tilanne_button" data-kayttaja-id="<b><?php echo$kayttaja_id; ?></b>"><!-- data-kayttaja-id on käyttäjän id, jota käytetään ajax-kutsussa -->
          <?php echo $button_text; ?>
          </button>

          </div>
        </div>
    </div>
</div>
      <div class="row rowHeader d-lg-flex justify-content-center mx-0">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-xl mt-0 ml-0">
                  <a href="index.php" title="etusivu"><img class="logo" src="img/logo_header.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-xl-flex justify-content-end align-items-center mr-5" id="navbarNavDropdown">
                                  <ul class="navbar-nav text-center">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="ui_huolto.php">OMAT TYÖTEHTÄVÄT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="ui_huolto_kaikki.php">KAIKKI AVOIMET TYÖTEHTÄVÄT</a>
                                                </li>
                                                <li class="nav-item viimeinen">
                                                    <a class="nav-link" href="php/logout.php">KIRJAUDU ULOS</a>
                                                </li>
                                    </ul>
                          </div>
                     </nav>
                </div>
      </div>