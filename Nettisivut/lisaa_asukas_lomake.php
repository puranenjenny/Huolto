<?php include "php/config.php";
include 'header_ui_toimisto.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Asukkaan lisäyslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_asukas.php" method="POST">
      <div class="form-group">
  <div><label class="input_label" for="etunimi" require>Etunimi:</label>
  <input type="text" id="etunimi" name="etunimi"></div><br>
 
  <div><label class="input_label" for="sukunimi" require>Sukunimi:</label>
  <input type="text" id="sukunimi" name="sukunimi"></div><br>
 
  <div><label class="input_label" for="osoite" require>Osoite:</label>
  <input type="text" id="osoite" name="osoite"></div><br>
 
  <div><label class="input_label" for="kaupunki" require>Kaupunki:</label>
  <input type="text" id="kaupunki" name="kaupunki"></div><br>

  <div><label class="input_label" for="postinumero" require>Postinumero:</label>
  <input type="text" id="postinumero" name="postinumero"></div><br>

  <div><label class="input_label" for="taloyhtio" >Taloyhtiö:</label>
  <input type="text" id="taloyhtio" name="taloyhtio" placeholder="ei pakollinen"></div><br>

  <div><label class="input_label" for="tunnus" require>Käyttäjätunnus:</label>
  <input type="text" id="tunnus" name="tunnus"></div><br>
 
  <div><label class="input_label" for="salasana" require>Salasana:</label>
  <input type="password" id="salasana" name="salasana"></div><br>

  <div><button type="submit" class="btn btn1" name="submit" value="submit">Lähetä</button></div>
</form>


</div>
<div class="row vali  mx-0"></div>
</div>
</div>
<div class="row kommentti2 text-center  mx-0">
    <h3>Muistithan sulkea kahvinkeittimen! ☺</h3>
</div> 



  


<?php include 'footer.php';?>