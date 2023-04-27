<?php session_start(); ?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Välilehden logo-->    
    <link rel="icon" href="img/logo_small.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <!-- Fontit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,500&display=swap" rel="stylesheet"> 
    <!--Oma CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/header.js"></script>
    <script src="js/nappi_ylos.js"></script>

    <title>R. Autio Oy</title>
   
    
  </head>
  <body class="justify-content-center"> <!-- poistin tästä d-lg-flex t.jenny -->
    

    <!--lisäpalkki tiedoille--> 
    <div class="container">
    <div class="row ylapalkki">
        <div class="col minikuva1"><img class="puhelin minikuva" src="img/puhelin.png" alt="puhelin">09 4545 669</div>
        <div class="col"><img class="sijainti minikuva" src="img/sijainti.png" alt="sijainti">Sofiankatu 4</div>
        <div class="col"><img class="email minikuva" src="img/email.png" alt="email">toimisto@rautio.fi</div>
        <div class="col-7"></div>
    </div>
</div>


   <div class="container-fluid">
      <div class="row">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg mt-0 ml-0">
                  <a href="index.php" title="etusivu"><img class="logo" src="img/logo_header.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-flex justify-content-end align-items-center" id="navbarNavDropdown">
                                  <ul class="navbar-nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="index.php">KOTI</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"  href="#">PALVELUT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"  href="#">ASIAKKAAMME</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">YHTEYSTIEDOT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"  href="#">OTA YHTEYTTÄ</a>
                                                </li>
                                                <!-- <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        KIRJAUDU
                                                        </a>
                                                            <div class="dropdown-menu bubble" aria-labelledby="navbarDropdownMenuLink">
                                                                <a class="dropdown-item" href="#">ASUKAS</a>
                                                                <a class="dropdown-item" href="#">ISÄNNÖITSIJÄ</a>
                                                                <a class="dropdown-item" href="#">ASIAKAS</a>
                                                                <a class="dropdown-item" href="#">TYÖNTEKIJÄ</a>
                                                            </div>
                                                </li> -->

                                                <!-- alasvetovalikko klikkaamalla -->

                                                 <div class="dropdown">
                                                    <button class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" onclick="showDropDown()" class="dropbtn">KIRJAUDU</button>
                                                    <div id="myDropdown" class="dropdown-menu bubble">
                                                        <a class="dropdown-item" href="#home">ASUKAS</a>
                                                        <a class="dropdown-item" href="#about">ISÄNNÖITSIJÄ</a>
                                                        <a class="dropdown-item" href="#contact">ASIAKAS</a>
                                                        <a class="dropdown-item" href="#contact">TYÖNTEKIJÄ</a>
                                                    </div>
                                                </div> 
                                    </ul>
                          </div>
                     </nav>
                </div>
      </div>
  </div>  
<!--nappi joka vie sivun ylälaitaan-->
<button onclick="topFunction()" id="btn_ylos" title="Go to top">Ylös</button>
