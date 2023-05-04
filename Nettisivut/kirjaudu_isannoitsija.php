<?php
if (!isset($_SESSION)) {
    session_start();
}?>
<?php include 'header.php';?>
<script src="js/kirjautumiserror.js"></script>

<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0 text-center">
      <div class="col text-center"> <h3>Hei isännöitsijä! Ole hyvä ja kirjaudu!<br><br></h3></div>

  </div>

  <div class="row  mx-0 text-center">
    <div class="col text-center"> <p><b>Kirjautuneena käyttäjänä pääset jättämään vikailmoituksen kiireettömistä ongelmista, jotka käsitellään ja korjataan normaalina työaikana klo 08.00-16.00 <br><br>
    Jos tilanne vaatii välitöntä huomiotamme - kuten vesivuodot, viemäritukokset tai sähköviat - soita 24/7 päivystysnumeroomme 040 4545 669</b></p></div>


<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div  class="bg-cover text-white d-flex align-items-center" id="taustakuva3">
  <div class="container3">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta2">
        <form method="POST" action="php\isannoitsija_kirjautumiskoodi.php" class="form" onsubmit="saveScrollPosition()">
          <div class="form-group">
            <label for="tunnus">Tunnus *</label>
            <input id="tunnus" type="text" name="tunnus" required class="form-control text-center" placeholder="mmeikalainen"><br>
          </div>
          <div class="form-group">
            <label for="salasana">Salasana *</label>
            <input id="salasana" type="password" name="salasana" required class="form-control text-center" placeholder="salasana123"><br>
          </div>
          <button type="submit" value="Submit" class="btn btn1">Kirjaudu</button>
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