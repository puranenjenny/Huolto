<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Työntekijöiden hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
                <a class="m-2 btn nappi" href="lisaa_tyontekija_lomake.php">Lisää työntekijä</a>
            </div>
                <div class="lomake_tausta lomake_vika table-responsive">
                            <table class="text-end table table-striped table-vika table-yhteys">
                                <tr>
                                <th>Työntekijän ID</th>
                                <th>Etunimi</th>
                                <th>Sukunimi</th>
                                <th>Tila</th>
                                <th>Rooli</th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/tyontekijalistaus.php');
                                         $members = json_decode($JSON_tyontekijat, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>   
                                                     <td><?php echo $member['Etunimi']; ?></td>
                                                     <td><?php echo $member['Sukunimi']; ?></td>
                                                     <td><?php echo $member['Tila']; ?></td>
                                                     <td><?php echo $member['Rooli']; ?></td>
                                                     <td><?php echo '<a class="btn btn-warning" href="php/valittuTyontekija.php?id='.$member['ID'].'">Muokkaa</a>'; ?></td>
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
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 
<?php include 'footer.php';?>