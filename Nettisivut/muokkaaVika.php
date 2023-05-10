<?php 
include "php/config.php";
include "php/hae_tyontekijat.php";
include 'header_ui_toimisto.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container1">
        <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Muokkaa vikailmoitusta</h3>
      <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="php/teePaivitysVikaIlmo.php" method="POST">
                                <?php
                                $JSON_paivita = file_get_contents("php/valittuVika.json");
                                $users = json_decode($JSON_paivita, true);

                                if(count($users) != 0){
                                    foreach($users as $key1){
                                        foreach($key1 as $user){
                                ?>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="jattaja">Ilmoituksen jättäjä:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="jattaja" value="<?php echo $user['Ilmoittaja']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="kuvaus">Vian kuvaus:</label>
                        </div>
                        <textarea disabled id="vika" type="textarea" name="kuvaus" required class="form-control rounded-select" required value=""><?php echo $user['Viankuvaus']; ?></textarea>
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="osoite">Osoite:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="osoite" value="<?php echo $user['Osoite']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="yleisavain">Yleisavaimen käyttö:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="yleisavain" value="<?php echo $user['Yleisavain']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="puhelin">Puhelinnumero:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="puhelin" value="<?php echo $user['Puhelin']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Tilanne">Tilanne:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="Tilanne" name="Tilanne" class="rounded-select leveys-select">
                                        <option value="<?php echo $user['TilaID'];?>" disabled selected hidden><?php echo $user['Tilanne']; ?></option>
                                        <option value="1">Käsittelemättä</option>
                                        <option value="2">Avoin</option>
                                        <option value="3">Työn alla</option>
                                        <option value="4">Valmis</option>                                   
                        </select>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Tilanne">Työntekija:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="Tyontekija" name="tyontekija" class="rounded-select leveys-select">
                        <option value="" disabled selected hidden>&nbsp;Valitse huoltohenkilö&nbsp;</option>
                                        <?php
                                                $JSON_tyontekijat = file_get_contents("tyontekijat.json");
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
                    </div>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="ui-uudet-ilmot.php">Takaisin</a>
                    <button name="tallenna" type="submit" class="mx-3 btn btn-success">Tallenna</button>
                    <?php echo '<a href="php/poistaVikaIlmo.php?tehtava_id='.$user['ID'].'" class="btn btn-danger">Poista</a>'; ?>
                </form>
                <?php
                                                    }
                                                }
                                            }
                                        ?>   
            </div>
        </div>
    </div>
</div>
<div class="row vali  mx-0"></div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 

<?php include 'footer.php';?>