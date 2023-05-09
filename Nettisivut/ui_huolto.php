<?php include 'header_ui_huolto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
  <h3>Tervetuloa omalle työpöydälle <?php echo htmlspecialchars($etunimi . " " . $sukunimi . "!"); ?></h3> <!--tulostetaan Hei etunimi sukunimi -->

  </div>

<div class="row vali mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center">
    <div class="container5 lomake_tausta3">
        <div class="row justify-content-center mx-0">
            <h3>Avoimet tiketit</h3><br><br><br></div>
                <div class="row justify-content-center mx-0">
                 <div class="col-lg-12 text-center">
                    
                            <table class="table table-striped">
                                <tr>
                                <th>ID</th> 
                                <th>Tila</th>
                                <th>Viankuvaus</th>
                                <th>Ilmoittaja</th>
                                <th>Osoite</th>
                                <th>Rappu / Tila</th>
                                <th>Yleisavain</th>
                                <th>Puh. numero</th>
                                <th>Työntekijä</th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/vikailmoitukset2.php');
                                         $members = json_decode($JSON_vika, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                <tr>
                                                <td><?php echo $member['ID']; ?></td>
                                                <td><?php echo $member['Tilanne']; ?></td>
                                                <td><?php echo $member['Viankuvaus']; ?></td>
                                                <td><?php echo $member['Jattaja']; ?></td>
                                                <td><?php echo $member['Osoite']; ?></td>
                                                <td><?php echo $member['Tila']; ?></td>
                                                <td><?php echo $member['Yleisavaimen_kaytto']; ?></td>
                                                <td><?php echo $member['Numero']; ?></td>
                                                <td><?php echo $member['Tyontekija']; ?></td>
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
                <div class="col-lg-4 lomake_tausta3">
                <div class="row justify-content-center mx-0">
            <h3>Omat tehtävät</h3><br><br><br></div>
                <div class="row justify-content-center mx-0"> </div>

                </div>


<div class="row vali mx-0"></div>





<?php include 'footer.php';?>