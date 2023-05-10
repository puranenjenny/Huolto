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
      <div class="col text-center"> <h3>Päivitä<br><br></h3></div>
  </div>

  <div class="row  mx-0">
    <div class="col text-center"> <p><b>Päivitä tehtävän työntekijä, tilanne ja korjaustoimenpide.</b></p>
  </div>


  <form method="POST" action="php/huolto_muokkaa.php">
  <div class="form-group">
    <label class="input_label2" for="tyontekija_valikko">Työntekijä:</label>
    <?php
    // haetaan kaikki työntekijät tietokannasta
    $tyontekija_id = "";
    if (isset($_GET["tyontekija"])) {
      $tyontekija_id = isset($_GET["tyontekija"]) ? $_GET["tyontekija"] : null;

    }
    include('tyontekija_lista2.php');
    $tyontekijat = json_decode($JSON_tyontekijat, true);
    ?>
    <select class="form-control" name="tyontekija_id" id="tyontekija_id">
      <?php foreach ($tyontekijat as $tyontekija) { ?>
        <option value="<?php echo $tyontekija['tyontekija_id']; ?>" <?php if (isset($tyontekija_id) && $tyontekija['tyontekija_id'] == $tyontekija_id) echo "selected"; ?>>
  <?php echo $tyontekija['tyontekija_id'] . " - " . $tyontekija['etunimi'] . " " . $tyontekija['sukunimi'] . " "; ?>
</option>
      <?php } ?>
    </select>
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
  <select class="form-control" name="tehtavan_tilanne_id" id="tilanne_select">
    <?php foreach ($tilanteet as $tilanne) { ?>
      <option value="<?php echo $tilanne['tehtavan_tilanne_id']; ?>" <?php if (isset($tehtavan_tilanne_id) && $tilanne['tehtavan_tilanne_id'] == $tehtavan_tilanne_id) echo "selected"; ?>><?php echo $tilanne['tehtavan_tilanne']; ?></option>
    <?php } ?>
  </select>
</div>
<input type="hidden" name="tehtava_id" value="<?php echo $tehtava_id; ?>">
  <div class="form-group">
    <label class="input_label" for="korjaustoimenpide">Korjaustoimenpide:</label>
    <textarea name="korjaustoimenpide" id="korjaustoimenpide"></textarea>
  </div>
  <button type="submit" class="btn btn1" name="laheta" value="submit">Lähetä</button>
</form>
</div>
<div class="row vali  mx-0"></div>
</div>
</div>
