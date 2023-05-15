
<?php 
include "php/config.php";
include 'header_ui_toimisto.php';
include 'php/hae_taloyhtiot_ja_tilat_toimisto.php';
include 'php/hae_tyontekijat.php'
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/isannoitsija_valinnat.js"></script>

<div class="bg-cover text-white d-flex align-items-center">
    <div class="container10">
        <div class="row justify-content-center mx-0">
            <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Vikailmoituslomake</h3>
            <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="vikalomake_toimisto_toiminto.php" method="POST">
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="kuvaus">Vian kuvaus:</label>
                        </div>
                        <textarea id="vika" type="textarea" name="kuvaus" required class="form-control rounded-select" placeholder="Kerro ongelmasta"></textarea>
                        
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="taloyhtio">Taloyhtiöt:</label>
                        </div>
                        <div class="select-wrapper text-center">
                        <select required id="taloyhtio" name="taloyhtio" class="rounded-select leveys-select">
                            <option value="">&nbsp;Valitse taloyhtiö&nbsp;</option>
                            <?php foreach ($taloyhtiot as $taloyhtio): ?>
                                <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>">
                                    <?php echo '&nbsp;' . $taloyhtio['nimi'] . '&nbsp;'; ?>
                                </option>
                            <?php endforeach; print $taloyhtio_id; ?>
                        </select>

                        </div>
                    </div>
                    
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="tila">Valitse tila:</label>
                        </div>
                        <div class="select-wrapper text-center">
                        <select id="tila" name="tila" class="rounded-select leveys-select">
                            <option value="14">&nbsp;Tilat&nbsp;</option>
                            <?php foreach ($tilat as $tila): ?>
                                <option value="<?php echo $tila['tila_id']; ?>" data-taloyhtio-id="<?php echo $tila['taloyhtio_id']; ?>">
                                    <?php echo '&nbsp;' . $tila['nimi'] . '&nbsp;'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        </div>
                    </div>
                    
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Tilanne">Tilanne:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="Tilanne" name="Tilanne" class="rounded-select leveys-select">
                                        <option value="1" selected hidden>Valitse työn tilanne</option>
                                        <option value="1">Käsittelemättä</option>
                                        <option value="2">Avoin</option>
                                        <option value="3">Työn alla</option>
                                        <option value="4">Valmis</option>                                   
                        </select>
                    </div>
                    
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Tilanne">Työntekija:</label>
                        </div>
                        <div class="select-wrapper text-center">
                        <select required id="Tyontekija" name="tyontekija" class="rounded-select leveys-select">
                        <option value="" disabled selected hidden>&nbsp;Valitse huoltohenkilö&nbsp;</option>
                                        <?php
                                                $JSON_tyontekijat = file_get_contents("php/hae_tyontekijat.json");
                                                $tyontekijat = json_decode($JSON_tyontekijat, true);


                                                if(count($tyontekijat) != 0){
                                                    foreach($tyontekijat as $tyontekija){
                                                        foreach($tyontekija as $user1){

                                        ?>
                                        <option value="<?php echo$user1['ID']; ?>"><?php echo '&nbsp;' . $user1['ID'] . '. ' . $user1['Etunimi'] . ' ' .$user1['Sukunimi'] . '&nbsp;'; ?></option>        
                                        <?php
                                                    }
                                                }
                                            }
                                        ?> 
                        </select>
                    </div>
                    <br>
                    <a class="btn btn1" href="ui-uudet-ilmot.php">Takaisin</a>
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