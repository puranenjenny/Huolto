<?php include "php/config.php";
include 'header_ui_toimisto.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Isännöitsijän lisäyslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_isannoitsija.php" method="POST">
      <div class="form-group">
  <div><label class="input_label" for="etunimi" require>Etunimi:</label>
  <input class="rounded-input" type="text" id="etunimi" name="etunimi" placeholder=" Matti"></div><br>
 
  <div><label class="input_label" for="sukunimi" require>Sukunimi:</label>
  <input class="rounded-input" type="text" id="sukunimi" name="sukunimi" placeholder=" Meikäläinen"></div><br>

  <div><label class="input_label" for="puhelin" require>Puhelinnumero:</label>
  <input class="rounded-input" type="text" id="puhelin" name="puhelin" placeholder=" 0401234567"></div><br>

  <div><label class="input_label" for="email" require>Email:</label>
  <input class="rounded-input" type="text" id="email" name="email" placeholder=" jotain@jotain.fi"></div><br>
 
  <div><label class="input_label" for="tunnus" require>Käyttäjätunnus:</label>
  <input class="rounded-input" type="text" id="tunnus" name="tunnus" placeholder=" mmeikalainen"></div><br>
 
  <div><label class="input_label" for="salasana" require>Salasana:</label>
  <input class="rounded-input" type="password" id="salasana" name="salasana"></div><br>



  <div>
  <a class="btn btn1" href="ui-naytaisannoitsijat.php">Takaisin</a>
  <button type="submit" class="btn btn1" name="submit" value="submit">Lähetä</button></div>
</form>


</div>
<div class="row vali  mx-0"></div>
</div>
</div>
<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 



  


<?php include 'footer.php';?>