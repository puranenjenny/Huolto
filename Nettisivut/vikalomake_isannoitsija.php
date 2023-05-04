<?php include 'php/session.php';?>
<?php include 'php/hae_isannoitsijan_nimi.php';?> 

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

    <title>Vikailmoitus</title>
   
    
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
                                                    <a class="nav-link" href = "php/logout.php">KIRJAUDU ULOS</a>
                                                </li>
                                    </ul>
                          </div>
                     </nav>
                </div>
      </div>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
  <h3>Tervetuloa omalle sivullesi <?php echo htmlspecialchars($etunimi . " " . $sukunimi . "!"); ?></h3> <!--tulostetaan Hei etunimi sukunimi -->

  </div>

<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center">
    <div class="container1">
        <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Vikailmoituslomake isännöitsijöille</h3>
            <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="lisaaVikailmoitus.php" method="POST">
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="vika">Viesti/vian kuvaus:</label>
                        </div>
                        <textarea id="vika" type="textarea" name="vika" required class="form-control rounded-select" placeholder="Kerro ongelmasta"></textarea>
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="taloyhtio">Valitse taloyhtiö:</label>
                        </div>
                        <div class="select-wrapper text-center">
                            <select id="taloyhtio" name="taloyhtio" class="rounded-select">
                                <option value="#">&nbsp;tähän taloyhtiöt&nbsp;</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="tila">Valitse tila:</label>
                        </div>
                        <div class="select-wrapper text-center">
                            <select id="tila" name="tila" class="rounded-select">
                                <option value="#">&nbsp;tähän esim rappukäytävä&nbsp;</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn1">Lähetä</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <div class="row vali  mx-0"></div>
    <div class="row  mx-0 text-center">
    <div class="col text-center"> <p><b>Täytä tämä vikailmoitus kiireettömistä ongelmista, jotka käsitellään ja korjataan normaalina työaikana klo 08.00-16.00 <br><br>
    Jos tilanne vaatii välitöntä huomiotamme - kuten vesivuodot, viemäritukokset tai sähköviat - soita 24/7 päivystysnumeroomme 040 4545 669</b></p></div>
    <div class="row vali  mx-0"></div>

</div>
</div>

<?php include 'footer.php';?>