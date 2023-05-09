<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_isannoitsijat.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Taloyhtiön lisäyslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_taloyhtio.php" method="POST">
      <div class="form-group">
  <div><label class="input_label" for="osoite" require>Osoite:</label>
  <input type="text" id="osoite" name="osoite"></div><br>
 
  <div><label class="input_label" for="kaupunki" require>Kaupunki:</label>
  <input type="text" id="kaupunki" name="kaupunki"></div><br>

  <div><label class="input_label" for="postinumero" require>Postinumero:</label>
  <input type="text" id="postinumero" name="postinumero"></div><br>

  <div><label class="input_label" for="nimi" require>Taloyhtiön nimi:</label>
  <input type="text" id="nimi" name="nimi"></div><br>

  <div class="form-group">
    <label class="input_label2" for="isannoitsija_id">Valitse isännöitsijä:</label>
    <select id="isannoitsija" name="isannoitsija_id">
    <option value="">&nbsp;Isännöitsijä&nbsp;</option>
    <?php foreach ($isannoitsijat as $isannoitsija): ?>
        <option value="<?php echo $isannoitsija['isannoitsija_id']; ?>">
            <?php echo '&nbsp;' . $isannoitsija['etunimi'] . ' ' . $isannoitsija['sukunimi'] . '&nbsp;'; ?>
        </option>
    <?php endforeach; ?>
</select>
</div>
<br>

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