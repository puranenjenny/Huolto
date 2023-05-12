<?php 
include "php/config.php";
include 'header_ui_toimisto.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container1">
        <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Muokkaa taloyhtion tietoja</h3>
      <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="php/teePaivitysTaloyhtio.php" method="POST">
                                <?php
                                $JSON_paivita_taloyhtio = file_get_contents("php/valittuTaloyhtio.json");
                                $users = json_decode($JSON_paivita_taloyhtio, true);

                                if(count($users) != 0){
                                    foreach($users as $key1){
                                        foreach($key1 as $user){
                                ?>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="id">Taloyhtiönumero:</label>
                        </div>
                        <input class="rounded-input leveys-select" disabled type="text" name="id" value="<?php echo $user['ID']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Nimi">Nimi:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Nimi" value="<?php echo $user['Nimi']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Osoite">Osoite:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Osoite" value="<?php echo $user['Osoite']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Postinumero">Postinumero:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Postinumero" value="<?php echo $user['Postinumero']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Kaupunki">Kaupunki:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Kaupunki" value="<?php echo $user['Kaupunki']; ?>">
                        <br>
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="isannoitsija_id">Isannöitsijä:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="isannoitsija_id" name="isannoitsija_id" class="rounded-select leveys-select">
                                <option value="<?php echo $user['isannoitsija_id'];?>"selected hidden><?php echo $user['Etunimi']. ' ' . $user['Sukunimi']; ?></option>
                                        <?php
                                                $JSON_isannoitsijat = file_get_contents("isannoitsijat.json");
                                                $isannoitsijat = json_decode($JSON_isannoitsijat, true);


                                                if(count($isannoitsijat) != 0){
                                                    foreach($isannoitsijat as $isannoitsija){
                                                        foreach($isannoitsija as $user1){

                                        ?>
                                        <option value="<?php echo$user1['id']; ?>"><?php echo '&nbsp;' . $user1['id'] . '. ' . $user1['Etunimi'] . ' ' .$user1['Sukunimi'] . '&nbsp;'; ?></option>        
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>             
                    </select>
                    </div>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="ui-huoltohenkilot.php">Takaisin</a>
                    <button name="tallenna" type="submit" class="mx-3 btn btn-success">Tallenna</button>
                    <?php echo '<a href="php/poistaTaloyhtio.php?id='.$user['ID'].'" class="btn btn-danger">Poista</a>'; ?>
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