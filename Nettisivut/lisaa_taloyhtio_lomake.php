<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_isannoitsijat.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container10">
        <div class="row justify-content-center mx-0">
            <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Taloyhtiön lisäyslomake</h3>
            <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="lisaa_taloyhtio.php" method="POST">
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="osoite" require>Osoite:</label>
                        </div>
                        <input class="rounded-input" type="text" id="osoite" name="osoite">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="kaupunki" require>Kaupunki:</label>
                        </div>
                        <input class="rounded-input" type="text" id="kaupunki" name="kaupunki">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="postinumero" require>Postinumero:</label>
                        </div>
                        <input class="rounded-input" type="text" id="postinumero" name="postinumero">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="nimi" require>Taloyhtiön nimi:</label>
                        </div>
                        <input class="rounded-input" type="text" id="nimi" name="nimi">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="isannoitsija_id">Valitse isännöitsijä:</label>
                        </div>
                        <div class="select-wrapper text-center">
                        <select class="rounded-select" id="isannoitsija" name="isannoitsija_id">
                            <option value="">&nbsp;Isännöitsijä&nbsp;</option>
                            <?php foreach ($isannoitsijat as $isannoitsija): ?>
                                <option value="<?php echo $isannoitsija['isannoitsija_id']; ?>">
                                    <?php echo '&nbsp;' . $isannoitsija['etunimi'] . ' ' . $isannoitsija['sukunimi'] . '&nbsp;'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <a class="btn btn1" href="ui-naytataloyhtiot.php">Takaisin</a>
                    <button type="submit" class="btn btn1">Lähetä</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 

<?php include 'footer.php';?>