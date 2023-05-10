<?php include 'header_ui_huolto.php';?>
<?php
   $tehtava_id = isset($_POST['tehtava_id']) ? $_POST['tehtava_id'] : $_GET['tehtava_id'];

  // haetaan kaikki työntekijät tietokannasta
  include('tyontekija_lista2.php');
  $tyontekijat = json_decode($JSON_tyontekijat, true);

  // haetaan kaikki tilanteet tietokannasta
  include('php/hae_tilanteet.php');
  $tilanteet = json_decode($JSON_tilanteet, true);


?>
<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Tehtävän päivitys<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
  <form class="form" method="POST" action="php/huolto_muokkaa.php">
  <div class="form-group">
    <div><label class="input_label2" for="tyontekija_valikko">Työntekijä:</label>
    <?php
    // haetaan kaikki työntekijät tietokannasta
    $tyontekija_id = "";
    if (isset($_GET["tyontekija"])) {
      $tyontekija_id = isset($_GET["tyontekija"]) ? $_GET["tyontekija"] : null;

    }
    include('tyontekija_lista2.php');
    $tyontekijat = json_decode($JSON_tyontekijat, true);
    ?>
    <select class="rounded-select" name="tyontekija_id" id="tyontekija_id">
      <?php foreach ($tyontekijat as $tyontekija) { ?>
        <option value="<?php echo $tyontekija['tyontekija_id']; ?>" <?php if (isset($tyontekija_id) && $tyontekija['tyontekija_id'] == $tyontekija_id) echo "selected"; ?>>
  <?php echo "&nbsp;" . $tyontekija['tyontekija_id'] . " - " . $tyontekija['etunimi'] . " " . $tyontekija['sukunimi'] . "&nbsp;"; ?>
</option>
      <?php } ?>
    </select></div><br>
    <input type="hidden" name="tehtava_id" value="<?php echo $tehtava_id; ?>">
  </div>
  <div class="form-group">
  <label class="input_label2" for="tilanne_select">Tilanne:</label>
  <?php
    $tehtavan_tilanne_id = "";
    if (isset($_POST["tilanne"])) {
      $tehtavan_tilanne_id = $_POST["tilanne"];
    }

    // haetaan kaikki tilanteet tietokannasta
    include('php/hae_tilanteet.php');
    $tilanteet = json_decode($JSON_tilanteet, true);
  ?>
  <select class="rounded-select" name="tehtavan_tilanne_id" id="tilanne_select">
    <?php foreach ($tilanteet as $tilanne) { ?>
      <option value="<?php echo $tilanne['tehtavan_tilanne_id'] ; ?>" <?php if (isset($tehtavan_tilanne_id) && $tilanne['tehtavan_tilanne_id'] == $tehtavan_tilanne_id) echo "selected"; ?>><?php echo "&nbsp;" . $tilanne['tehtavan_tilanne']. "&nbsp;"; ?></option>
    <?php } ?>
  </select>
</div><br>
<input type="hidden" name="tehtava_id" value="<?php echo $tehtava_id; ?>">
  <div class="form-group">
    <label class="input_label2" for="korjaustoimenpide">Korjaustoimenpide:</label><br>
    <textarea rows=5 name="korjaustoimenpide" id="korjaustoimenpide"></textarea>
  </div><br>
  <button type="submit" class="btn btn1" name="laheta" value="submit">Lähetä</button>
</form>
</div>
<div>
<div class="row kommentti2 text-center  mx-0">
    
</div> 
<?php include 'footer.php';?>
    </div>
