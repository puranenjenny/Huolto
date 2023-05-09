<?php 
include 'php/config.php';
include 'php/hae_kayttajaid.php';
include 'php/hae_asukkaan_taloyhtio.php';
?>

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
    
    <title>Onnistunut lisäys</title>
</head>
 
<body class="justify-content-center"> 
    

    <div class="container-fluid">
       <div class="row mx-0">
        <div class="ylapalkki d-block d-md-flex">
            <div class="col-12 col-md-3 col-lg-2 minikuva1"><img class="puhelin minikuva" src="img/puhelin.png" alt="puhelin">09 4545 669</div>
            <div class="col-12 col-md-3 col-lg-2"><img class="sijainti minikuva" src="img/sijainti.png" alt="sijainti">Sofiankatu 4</div>
            <div class="col-12 col-md-3 col-lg-2"><img class="email minikuva" src="img/email.png" alt="email">toimisto@rautio.fi</div>
        </div>
        </div>
          <div class="row rowHeader d-lg-flex justify-content-center mx-0">
                  <div class="col-lg-10">
                    <nav class="navbar navbar-expand-lg mt-0 ml-0">
                      <a href="index.php" title="etusivu"><img class="logo" src="img/logo_header.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse d-lg-flex justify-content-end align-items-center" id="navbarNavDropdown">
                                      <ul class="navbar-nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href ="php/logout.php">KIRJAUDU ULOS</a>
                                                    </li>
                                        </ul>
                              </div>
                         </nav>
                    </div>
          </div>
    
  <div class="text-center container4 center">
   <?php 
    try{  
        $kayttaja_id = $kayttaja_id; //arvo haetaan hae_kayttajaid.php:stä
        $taloyhtio_id = $taloyhtio_id; //arvo haetaan hae_asukkaan_taloyhtio.php:stä
        $kuvaus = $_REQUEST['kuvaus']; // arvo otetaan lomakkeesta
        $yleisavaimen_kaytto = $_REQUEST['yleisavaimen_kaytto'];
        $numero = $_REQUEST['numero'];
        $tehtavan_tilanne_id = 1; //vakio 1 eli käsittelemätön
        
        //lisäyskysely
        $sql = "INSERT INTO tehtavat (kayttaja_id, kuvaus, yleisavaimen_kaytto, numero, tehtavan_tilanne_id, taloyhtio_id) VALUES ('$kayttaja_id', '$kuvaus', '$yleisavaimen_kaytto', '$numero', '$tehtavan_tilanne_id', '$taloyhtio_id')";

        $lataa = $yhteys->prepare($sql);

        if($lataa->execute()){
            echo "<h3>Vikailmoituksesi on vastaanotettu. <br>" //ilmoitus teksti onnistuneesta lisäyksestä
            . " Palaamme asiaan mahdollisimman pian! <br> </h3>";
        } else {
            echo "ERROR: Virhe! Viestiä ei lähetetty tietokantaan $sql. "; //muuten kitisee jos ei onnistu 
        }
     
        $yhteys = NULL; // yhteyden sulku
  
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
?>
  </div>
</body>
 

<?php include 'footer.php';?>