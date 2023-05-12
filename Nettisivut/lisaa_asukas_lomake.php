<?php include "php/config.php";
include 'header_ui_toimisto.php';?>
<?php include 'php/hae_taloyhtiot.php';?>


<div class="container10 connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Asukkaan lisäyslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_asukas.php" method="POST">
      <div class="form-group">
  <div><label class="input_label" for="etunimi" require>Etunimi:</label>
  <input class="rounded-input" type="text" id="etunimi" name="etunimi" placeholder="&nbsp;Matti"></div><br>
 
  <div><label class="input_label" for="sukunimi" require>Sukunimi:</label>
  <input class="rounded-input" type="text" id="sukunimi" name="sukunimi" placeholder="&nbsp;Meikäläinen"></div><br>
 
  <div><label class="input_label" for="tunnus" require>Käyttäjätunnus:</label>
  <input class="rounded-input" type="text" id="tunnus" name="tunnus" placeholder="&nbsp;mmeikalainen"></div><br>
 
  <div><label class="input_label" for="salasana" require>Salasana:</label>
  <input class="rounded-input" type="password" id="salasana" name="salasana"></div><br>

  <div class="form-group">
    <label class="input_label" for="taloyhtio" require>Valitse taloyhtiö:</label>
    <select class="rounded-select" id="taloyhtio" name="taloyhtio">
        <option value="">&nbsp;Taloyhtiö&nbsp;</option>
        <?php foreach ($taloyhtiot as $taloyhtio): ?>
            <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>">
                <?php echo '&nbsp;' . $taloyhtio['nimi'] . '&nbsp;'; ?>
            </option>
        <?php endforeach; ?>
    </select>
  </div>
  <br>

  <div><label class="input_label" for="rappu" >Rappu ja numero:</label>
  <input class="rounded-input" type="text" id="rappu" name="rappu" placeholder="&nbsp;A 20 "></div><br>



  <div>
  <a class="btn btn1" href="ui-naytakayttajat.php">Takaisin</a>
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