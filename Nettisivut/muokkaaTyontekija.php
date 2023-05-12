<?php 
include "php/config.php";
include 'header_ui_toimisto.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container10">
        <div class="row justify-content-center mx-0">
        <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Muokkaa työntekijän tietoja</h3>
      <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="php/teePaivitysTyontekija.php" method="POST">
                                <?php
                                $JSON_paivita_tyontekija = file_get_contents("php/valittuTyontekija.json");
                                $users = json_decode($JSON_paivita_tyontekija, true);

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
                            <label for="Email">Sähköposti:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Email" value="<?php echo $user['Email']; ?>">
                        <br>
                    </div>
                    <div class="form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Puhelin">Puhelinnumero:</label>
                        </div>
                        <input class="rounded-input leveys-select" type="text" name="Puhelin" value="<?php echo $user['Puhelin']; ?>">
                        <br>
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="Tilanne-id">Tilanne:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="Tilanne-id" name="Tilanne-id" class="rounded-select leveys-select">
                                        <option value="<?php echo $user['Tilanne-id'];?>"selected hidden><?php echo $user['Tilanne']; ?></option>
                                        <option value="1">Vapaa</option>
                                        <option value="2">Varattu</option>                                 
                        </select>
                    </div>
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                            <label for="rooli-id">Rooli:</label>
                    </div>
                    <div class="select-wrapper text-center">
                        <select id="rooli-id" name="rooli-id" class="rounded-select leveys-select">
                                        <option value="<?php echo $user['rooli-id'];?>"selected hidden><?php echo $user['rooli']; ?></option>
                                        <option value="1">toimistohenkilö</option>
                                        <option value="2">huoltohenkilö</option>                                 
                        </select>
                    </div>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="ui-huoltohenkilot.php">Takaisin</a>
                    <button name="tallenna" type="submit" class="mx-3 btn btn-success">Tallenna</button>
                    <?php echo '<a href="php/poistaTyontekija.php?id='.$user['id'].'" class="btn btn-danger">Poista</a>'; ?>
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
</div>
<div class="row vali  mx-0"></div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 

<?php include 'footer.php';?>