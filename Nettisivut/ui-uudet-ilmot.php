<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
  <h3><br>Tervetuloa omalle työpöydälle <?php echo htmlspecialchars($etunimi . " " . $sukunimi . "!"); ?></h3> <!--tulostetaan Hei etunimi sukunimi -->

  </div>

<div class="row vali mx-0"></div>

    <div class="bg-cover text-white d-flex justify-content-center align-items-center">
        <div class="container9">
            <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Vikailmoitusten hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-uudet-ilmot.php">Uudet</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-kasittelyssa.php">Työn alla</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui_toimisto.php">Valmiit</a>
                <a class="m-2 btn nappi" href="vikalomake_toimisto.php">Lisää uusi</a>
            </div>
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Uudet vikailmoitukset</h3>
                <div class="text-center lomake_tausta lomake_vika table-responsive">
                            <table class="table table-striped table-vika">
                                <tr>
                                <th>ID</th>
                                <th>Ilmoittaja</th>
                                <th>Viankuvaus</th>
                                <th>Osoite</th>
                                <th>Päiväys</th>
                                <!-- <th>Tila</th>
                                <th>Osoite</th>
                                <th>Puh.nro</th> -->
                                <th></th>

                                </tr>
                                     <?php
                                         include('php/vikailmoitukset_uudet.php');
                                         $members = json_decode($JSON_vika, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>
                                                     <td><?php echo $member['Ilmoittaja']; ?></td>
                                                     <td><?php echo $member['Viankuvaus']; ?></td>
                                                     <td><?php echo $member['Osoite']; ?></td>
                                                     <td><?php echo $member['Paivays']; ?></td>
                                                     <td><a href="php/valittuVika.php?tehtava_id=<?php echo $member['ID']; ?>" class="btn btn-warning">Muokkaa</a></td>
                                                     </tr>
                                             <?php
                                             }
                                         }
                                         }
                                    ?>

                            </table>
                </div>
            </div>
        </div>
    </div>



</div>
</div>


<div class="row kommentti2 text-center  mx-0">
    <h3>Työntekijöiden kesäpäivät 17.6. klo 12 alkaen! ☺</h3>
</div> 

<?php include 'footer.php';?>