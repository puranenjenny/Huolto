<?php include "php/config.php";
include 'header_ui_toimisto.php';?>

<div class="bg-cover text-white d-flex align-items-center">
    <div class="container10">
        <div class="row justify-content-center mx-0">
            <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Isännöitsijän lisäyslomake</h3>
            <div class="text-center lomake_tausta lomake_vika">
                <form class="form" action="lisaa_isannoitsija.php" method="POST">
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                          <label for="etunimi" require>Etunimi:</label>
                        </div>
                        <input class="rounded-input" type="text" id="etunimi" name="etunimi" placeholder=" Matti">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="sukunimi" require>Sukunimi:</label>
                        </div>
                        <input class="rounded-input" type="text" id="sukunimi" name="sukunimi" placeholder=" Meikäläinen">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="puhelin" require>Puhelinnumero:</label>
                        </div>
                        <input class="rounded-input" type="text" id="puhelin" name="puhelin" placeholder=" 0401234567">
                    </div>
                    <div class="my-2 form-group form-floating">
                        <div class="label-wrapper">
                        <label for="email" require>Email:</label>
                        </div>
                        <input class="rounded-input" type="text" id="email" name="email" placeholder=" jotain@jotain.fi">
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
                    <a class="btn btn1" href="ui-naytaisannoitsijat.php">Takaisin</a>
                    <button type="submit" name="submit" class="btn btn1">Lähetä</button>
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