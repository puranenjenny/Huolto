<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
  <h3>Tervetuloa omalle työpöydälle <?php echo htmlspecialchars($etunimi . " " . $sukunimi . "!"); ?></h3> <!--tulostetaan Hei etunimi sukunimi -->

  </div>

<div class="row vali mx-0"></div>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1">
            <div class="row justify-content-center mx-0">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Vikailmoitusten hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
            <button  onclick="saveScrollPosition()" class="mx-2 btn btn-warning nappi"><a class="nappi" href="ui_toimisto.php">Kaikki</a></button>
                <button  onclick="saveScrollPosition()" class="mx-2 btn btn-warning nappi"><a class="nappi" href="ui-uudet-ilmot.php">Uudet</a></button>
                <button  onclick="saveScrollPosition()" class="mx-2 btn btn-warning nappi"><a class="nappi" href="ui-kasittelyssa.php">Käsittelyssä olevat</a></button>
                <button  class="mx-2 btn btn-warning nappi"><a class="nappi" href="lisaa_vikailmoitus.php">Lisää uusi</a></button>
            </div>
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">käsittelyssä olevat vikailmoitukset</h3>
                <div class="text-center lomake_tausta lomake_vika">
                            <table class="table table-striped table-vika">
                                <tr>
                                <th>ID</th>
                                <th>Viankuvaus</th>
                                <th>Osoite</th>
                                <th>Päiväys</th>
                                <!-- <th>Tila</th>
                                <th>Osoite</th>
                                <th>Ilmoittaja</th>
                                <th>Puh.nro</th> -->
                                <th></th>

                                </tr>
                                     <?php
                                         include('php/vikailmoitukset_kasitelty.php');
                                         $members = json_decode($JSON_vika, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>
                                                     <td><?php echo $member['Viankuvaus']; ?></td>
                                                     <td><?php echo $member['Osoite']; ?></td>
                                                     <td><?php echo $member['Paivays']; ?></td>
                                                     <td><a href="#" class="btn btn-warning">Muokkaa</a></td>
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

<?php include 'footer.php';?>