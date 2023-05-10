<?php 
include "php/config.php";
include "php/taloyhtiot.php";
include 'header_ui_toimisto.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container1">
        <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Muokkaa asukasta</h3>
      <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="php/teePaivitysAsukas.php" method="POST">
                                <?php
                                $JSON_paivita_asukas = file_get_contents("php/valittuAsukas.json");
                                $users = json_decode($JSON_paivita_asukas, true);

                                if(count($users) != 0){
                                    foreach($users as $key1){
                                        foreach($key1 as $user){
                                ?>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="id">ID:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="id" value="<?php echo $user['id']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Etunimi">Etunimi:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Etunimi" value="<?php echo $user['Etunimi']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Sukunimi">Sukunimi:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Sukunimi" value="<?php echo $user['Sukunimi']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="taloyhtio">Taloyhtiö:</label>
                        </div>
                        <div class="select-wrapper text-center">
                            <select id="taloyhtio" name="taloyhtio" class="rounded-select leveys-select">
                                        <option value="" disabled selected hidden>&nbsp;<?php echo $user['Taloyhtio']; ?>&nbsp;</option>
                                        <?php
                                                $JSON_taloyhtiot = file_get_contents("taloyhtiot.json");
                                                $taloyhtiot = json_decode($JSON_taloyhtiot, true);


                                                if(count($taloyhtiot) != 0){
                                                    foreach($taloyhtiot as $taloyhtio){
                                                        foreach($taloyhtio as $user1){

                                        ?>
                                        <option value="<?php echo$user1['ID']; ?>"><?php echo '&nbsp;' . $user1['Nimi'] . ', ' . $user1['Osoite'] . '&nbsp;'; ?></option>        
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>             
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Rappu">Rappu:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Rappu" value="<?php echo $user['Rappu']; ?>">
                        <br>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="ui-naytakayttajat.php">Takaisin</a>
                    <button name="tallenna" type="submit" class="mx-3 btn btn-success">Tallenna</button>
                    <?php echo '<a href="php/poistaAsukas.php?id='.$user['id'].'" class="btn btn-danger">Poista</a>'; ?>
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