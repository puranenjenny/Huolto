<?php session_start(); ?>

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
    <script src="js/header.js"></script>
    <script src="js/nappi_ylos.js"></script>

    <title>Työntekijän näkymä</title>
   
    
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
                                                    <a class="nav-link" href="ui_toimisto.php">VIKAILMOITUKSET</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="index.php">HUOLTOHENKILÖT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="index.php">YHTEYDENOTOT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="index.php">KIRJAUDU ULOS</a>
                                                </li>
                                    </ul>
                          </div>
                     </nav>
                </div>
      </div>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
      <div class="col text-center"> <h3>Hei Matti Meikäläinen!</h3></div>

  </div>

<div class="row vali mx-0"></div>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Vikailmoitukset</h3>
                <div class="text-center lomake_tausta lomake_vika">
                            <table class="table table-striped table-vika">
                                <tr>
                                <th>ID</th>
                                <th>Viankuvaus</th>
                                <!-- <th>Tila</th>
                                <th>Osoite</th>
                                <th>Ilmoittaja</th>
                                <th>Puh.nro</th> -->
                                <th></th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/vikailmoitukset.php');
                                         $members = json_decode($JSON_vika, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>
                                                     <td><?php echo $member['Viankuvaus']; ?></td>
                                                     <td><a href="#" class="btn btn-warning">Muokkaa</a></td>
                                                     <td><a href="#" class="btn btn-danger">Poista</a></td>
                                                     </tr>
                                             <?php
                                             }
                                         }
                                         }
                                    ?>

                            </table>
                </div>
            </div>
        </div>
    </div>



</div>
</div>

<?php include 'footer.php';?>