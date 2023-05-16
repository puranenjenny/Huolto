<?php
if (!isset($_SESSION)) { //jos session ei ole käynnissä, käynnistä se
    session_start();
}?>
<?php include 'header.php';?> <!-- sisällytetään headeri -->
<script src="js/kirjautumiserror.js"></script> <!-- sisällytetään kirjautumiserror.js joka palauttaa sivun scrollauskohdan jos kirjautuminen epäonnistuu -->

<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0 text-center">
      <div class="col text-center"> <h3>Hei asukas! Ole hyvä ja kirjaudu!<br><br></h3></div>

  </div>

  <div class="row  mx-0 text-center">
    <div class="col text-center"> <p><b>Kirjautuneena käyttäjänä pääset jättämään vikailmoituksen kiireettömistä ongelmista, jotka käsitellään ja korjataan normaalina työaikana klo 08.00-16.00 <br><br>
    Jos tilanne vaatii välitöntä huomiotamme - kuten vesivuodot, viemäritukokset tai sähköviat - soita 24/7 päivystysnumeroomme 040 4545 669</b></p></div>


<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div  class="bg-cover text-white d-flex align-items-center" id="taustakuva3"> <!-- muotoiluja -->
  <div class="container3">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta2">
        <form method="POST" action="php/asukas_kirjautumiskoodi.php" class="form" onsubmit="saveScrollPosition()"> <!-- lähetetään tiedot asukas_kirjautumiskoodi.php:lle -->
          <div class="form-group"> <!-- käyttäjätunnus -->
            <label for="tunnus">Tunnus *</label>
            <input id="tunnus" type="text" name="tunnus" required class="form-control text-center" placeholder="mmeikalainen"><br>
          </div>
          <div class="form-group"> <!-- salasana -->
            <label for="salasana">Salasana *</label>
            <input id="salasana" type="password" name="salasana" required class="form-control text-center" placeholder="salasana123"><br>
          </div>
          <button type="submit" value="Submit" class="btn btn1">Kirjaudu</button> <!-- lähetysnappi -->
                    <!-- error viesti jos tulee -->
                    <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger mt-3" role="alert" id="login_error"> 
                        <?php echo $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); // poistetaan errorviesti sessiosta kun se on näytetty ?>
                    <?php endif; ?>
                    <!-- errorviesti loppuu -->
          <div class="row vali  mx-0"></div>
          <div class="row vali  mx-0"></div>
          <p>Jos sinulla ei ole käyttäjätunnusta, ota yhteys toimistoomme toimisto@rautio.fi</p>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Me olemme täällä sinua varten - R. Autio Oy</h3>
</div> 

</div>
</div>



<?php include 'footer.php';?>