<?php include 'header_ui_huolto.php';?>
<?php
include 'header_ui_huolto.php';
include 'php/hae_tyontekijan_nimi.php';

$tehtava_id = isset($_POST['tehtava_id']) ? $_POST['tehtava_id'] : $_GET['tehtava_id'];
$tyontekija_id = isset($_SESSION['tyontekija_id']) ? $_SESSION['tyontekija_id'] : '';

// haetaan kaikki tilanteet tietokannasta
include('php/hae_tilanteet.php');
$tilanteet = json_decode($JSON_tilanteet, true);
?>

<div class="connect_tausta">
    <div class="row vali mx-0"></div>
    <div class="row vali mx-0"></div>

    <div class="row mx-0">
        <div class="col text-center">
            <h3>Tehtävän päivitys<br><br></h3>
        </div>
    </div>

    <div class="row vali mx-0"></div>

    <div class="bg-cover text-white d-flex align-items-center" id="taustakuva4">
        <div class="container1">
            <div class="row justify-content-center">
                <div class="text-center lomake_tausta">
                    <form class="form" method="POST" action="php/huolto_muokkaa.php">
                        <div class="form-group">
                        <label class="input_label2" for="tyontekija_id">Työntekijä:<br><?php echo $tyontekija_id ." ". $etunimi ." ". $sukunimi ?>   </label><br>
                            <input type="hidden" name="tyontekija_id" value="<?php echo $tyontekija_id; ?>">
                            <input type="hidden" name="tehtava_id" value="<?php echo $tehtava_id; ?>";>
                        </div><br>
                        <div class="form-group">
                            <label class="input_label2" for="tilanne_select">Tilanne:</label><br>
                            <?php
                            $tehtavan_tilanne_id = "";
                            if (isset($_POST["tilanne"])) {
                                $tehtavan_tilanne_id = $_POST["tilanne"]; // haetaan kaikki tilanteet tietokannasta
                            }
                            ?>
 
 <?php
    include('php/hae_tilanteet.php');
    $tilanteet = json_decode($JSON_tilanteet, true);
  ?>
  <select class="rounded-select" name="tehtavan_tilanne_id" id="tilanne_select">
    <?php foreach ($tilanteet as $tilanne) { ?>
      <option value="<?php echo $tilanne['tehtavan_tilanne_id'] ; ?>" <?php if (isset($tehtavan_tilanne_id) && $tilanne['tehtavan_tilanne_id'] == $tehtavan_tilanne_id) echo "selected"; ?>><?php echo "&nbsp;" . $tilanne['tehtavan_tilanne']. "&nbsp;"; ?></option>
    <?php } ?>
  </select>
</div><br>
<input type="hidden" id="kayttaja_id" name="kayttaja_id" value="<?php echo isset($_SESSION['kayttaja_id']) ? $_SESSION['kayttaja_id'] : ''; ?>" readonly>
  <div class="form-group">
    <label class="input_label2" for="korjaustoimenpide">Korjaustoimenpide:</label><br>
    <textarea class="rounded-textarea" rows=5 name="korjaustoimenpide" id="korjaustoimenpide"></textarea>
  </div><br>
  <button type="submit" class="btn btn1" name="laheta" value="submit">Lähetä</button>
</form>
</div>
</div>
</div>
</div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
</div>
<?php include 'footer.php';?>
