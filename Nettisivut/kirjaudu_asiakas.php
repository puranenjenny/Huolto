
<?php include 'header.php';?>

<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col-1"></div>
      <div class="col text-center"> <h3>Hei asiakas! Ole hyvä ja kirjadu<br><br></h3></div>
      <div class="col-1"></div> 
  </div>

  <div class="row  mx-0">
    <div class="col-1"></div>
    <div class="col text-center"> <p><b>Kirjautuneena käyttäjänä pääset jättämään vikailmoituksen ja tarkastelemaan jättämiesi vikailmoitusten tilaa.</b></p></div>
    <div class="col-1"></div> 

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div style="background: url(img/helsinki8.jpg)" class="bg-cover text-white d-flex align-items-center">
  <div class="container3">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
        <form method="POST" action="asiakas_kirjautumiskoodi.php" class="form">
          <div class="form-group">
            <label for="asiakas_tunnus">Tunnus *</label>
            <input id="asiakas_tunnus" type="asiakas_tunnus" name="asiakas_tunnus" required class="form-control"><br>
          </div>
          <div class="form-group">
            <label for="asiakas_salasana">Salasana *</label>
            <input id="asiakas_salasana" type="asiakas_salasana" name="asiakas_salasana" required class="form-control"><br>
          </div>
          <button type="submit" class="btn btn1">Kirjaudu</button><br><br><br><br><br>
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