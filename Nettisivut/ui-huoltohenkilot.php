<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Työntekijöiden hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
                <button  class="mx-2 btn btn-warning nappi"><a class="nappi" href="#">Lisää työntekijä</a></button>
            </div>
                <div class="lomake_tausta lomake_vika">
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
                                                     <td><button class="btn btn-warning"><?php echo '<a class="nappi" href="valittuTyontekija.php?id='.$member['ID'].'">Muokkaa</a>'; ?></button></td>
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