<?php include "php/config.php"; // yhteys tietokantaan
include 'header_ui_toimisto.php'; // toimiston header, joka lisää navigoinnin sekä roolin tarkistuksen sivulle
include 'php/hae_taloyhtiot.php';?> <!-- hakee taloyhtiöt tietokannasta -->


<div class="bg-cover text-white d-flex align-items-center"> 
    <div class="container10">
        <div class="row justify-content-center mx-0"> <!-- sivun asettelun määrittelyä -->
            <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Asukkaan lisäyslomake</h3>
            <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="lisaa_asukas.php" method="POST"> <!-- lomake, joka lähettää tiedot lisaa_asukas.php tiedostoon POST metodilla -->
                    <div class="my-2 form-group form-floating"> 
                        <div class="label-wrapper">
                          <label for="etunimi" require>Etunimi:</label> <!-- input kenttä, johon kirjoitetaan uuden asukkaan etunimi -->
                        </div>
                        <input class="rounded-input" type="text" id="etunimi" name="etunimi" placeholder=" Matti"> <!-- kentän määrittely, name kentän avulla tieto lähetetään lisaa_asukas.php tiedostoon -->
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="sukunimi" require>Sukunimi:</label>
                        </div>
                        <input class="rounded-input" type="text" id="sukunimi" name="sukunimi" placeholder=" Meikäläinen">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="tunnus" require>Käyttäjätunnus:</label>
                        </div>
                        <input class="rounded-input" type="text" id="tunnus" name="tunnus" placeholder=" mmeikalainen">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="salasana" require>Salasana:</label>
                        </div>
                        <input class="rounded-input" type="password" id="salasana" name="salasana">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="taloyhtio" require>Valitse taloyhtiö:</label> <!-- alasvetovalikko, josta valitaan taloyhtiö -->
                        </div>
                        <div class="select-wrapper text-center">
                        <select class="rounded-select" id="taloyhtio" name="taloyhtio"> <!-- kentän määrittely -->
                            <option value="">&nbsp;Taloyhtiö&nbsp;</option> <!-- oletusarvo -->
                            <?php foreach ($taloyhtiot as $taloyhtio): ?> <!-- hakee taloyhtiöt tietokannasta hyödyntäen hae_taloyhtiot.php tiedostoa -->
                                <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>"> <!-- listaa taloyhtiön id:n ... -->
                                    <?php echo '&nbsp;' . $taloyhtio['nimi'] . '&nbsp;'; ?> <!--... ja taloyhtiön nimen -->
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="rappu" >Rappu ja numero:</label>
                        </div>
                        <input class="rounded-input" type="text" id="rappu" name="rappu" placeholder="&nbsp;A 20 ">
                    </div>
                    <a class="btn btn1" href="ui-naytakayttajat.php">Takaisin</a>
                    <button type="submit" name="submit" class="btn btn1">Lähetä</button> <!-- lähetä nappi, joka lähettää tiedot lisaa_asukas.php tiedostoon -->
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 



<?php include 'footer.php';?> <!-- footer, joka sisältää muotoilut -->