<?php include "php/config.php";
include 'header_ui_toimisto.php';?>
<?php include 'php/hae_taloyhtiot.php';
?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>KESKEN<br>Vikailmoituslomake<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
      <form class="form" action="lisaa_vikailmo_toimisto.php" method="POST">
      <div class="form-group">
  <div><label class="input_label" for="viankuvaus" require>Viesti/vian kuvaus::</label>
  <textarea type="text" id="viankuvaus" name="viankuvaus" placeholder=""></textarea></div><br>
 
  <div><label class="input_label" for="sukunimi" require>Taloyhtiö:</label>
  <select id="taloyhtio" name="taloyhtio" class="rounded-select">
                            <option value="">&nbsp;Valitse taloyhtiö&nbsp;</option>
                            <?php foreach ($taloyhtiot as $taloyhtio): ?>
                                <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>">
                                    <?php echo '&nbsp;' . $taloyhtio['nimi'] . ' - ' . $taloyhtio['osoite'] . '&nbsp;'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select></div><br>
 
  <div><label class="input_label" for="tunnus" require>Tila:</label>
  <select id="tila" name="tila" class="rounded-select">
                            <option value="">&nbsp;Tilat&nbsp;</option>
                            <?php foreach ($tilat as $tila): ?>
                                <option value="<?php echo $tila['tila_id']; ?>" data-taloyhtio-id="<?php echo $tila['taloyhtio_id']; ?>">
                                    <?php echo '&nbsp;' . $tila['nimi'] . '&nbsp;'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select></div><br>
 
  <br>

  <div><label class="input_label" for="rappu" >Rappu ja numero:</label>
  <input type="text" id="rappu" name="rappu" placeholder=" A 20 "></div><br>



  <div><button type="submit" class="btn btn1" name="submit" value="submit">Lähetä</button></div>
</form>


</div>
<div class="row vali  mx-0"></div>
</div>
</div>
<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 



  


<?php include 'footer.php';?>