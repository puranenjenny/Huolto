<?php include "config.php";
include "../header.php"
?>
<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Asukkaan lisäyslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva1">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_asukas.php" method="POST">
      <div class="form-group">
  <label for="etunimi">Etunimi:</label>
  <input type="text" id="etunimi" name="etunimi"><br><br>
 
  <label for="sukunimi">Sukunimi:</label>
  <input type="text" id="sukunimi" name="sukunimi"><br><br>
  
  <label for="tunnus">Käyttäjätunnus:</label>
  <input type="text" id="tunnus" name="tunnus"><br><br>
 
  <label for="salasana">Salasana:</label>
  <input type="password" id="salasana" name="salasana"><br><br>
 
  <label for="osoite">Osoite:</label>
  <input type="text" id="osoite" name="osoite"><br><br>
 
  <label for="kaupunki">Kaupunki:</label>
  <input type="text" id="kaupunki" name="kaupunki"><br><br>

  <label for="postinumero">Postinumero:</label>
  <input type="text" id="postinumero" name="postinumero"><br><br>
  <label for="taloyhtio">Taloyhtiö:</label>

  <input type="text" id="taloyhtio" name="taloyhtio"><br><br>
  <label for="kayttaja">Käyttäjä(Asukas,Työntekijä,Isännöitsijä):</label>
  <input type="text" id="kayttaja" name="kayttaja"><br><br>
  <button type="submit" class="btn btn1" name="submit" value="submit">Lähetä</button>
</form>
</form>

</div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Kun tarvitset kokeneita ja ammattitaitoisia kiinteistöhuoltajia, voit aina luottaa R. Autio Oy:hyn.</h3>
</div> 

</div>
</div>

  


<?php include '../footer.php';?>