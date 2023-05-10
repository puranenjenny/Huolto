<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Käyttäjien hallinta</h3>
            <div class="d-flex lomake_tausta napit_kayttaja">
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytakayttajat.php">Näytä asukkaat</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytaisannoitsijat.php">Näytä isännöitsijät</a>
                <a class="m-2 btn nappi" href="lisaa_asukas_lomake.php">Lisää asukas</a>
                <a class="m-2 btn nappi" href="lisaa_isannoitsija_lomake.php">Lisää isännöitsijä</a>
                <a class="m-2 btn nappi" href="lisaa_taloyhtio_lomake.php">Lisää taloyhtiö</a>
                
            </div>
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Asukkaat:</h3>
                <div class="lomake_tausta lomake_vika table-responsive">
                            <table class="text-end table table-striped table-vika table-yhteys">
                                <tr>
                                <th>Asukasnumero</th>
                                <th>Etunimi</th>
                                <th>Sukunimi</th>
                                <th>Taloyhtiö</th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/kayttajat_listaus.php');
                                         $members = json_decode($JSON_kayttaja, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['id']; ?></td>   
                                                     <td><?php echo $member['Etunimi']; ?></td>
                                                     <td><?php echo $member['Sukunimi']; ?></td>
                                                     <td><?php echo $member['Taloyhtio']; ?></td>
                                                     <td><?php echo '<a class="btn btn-warning" href="php/valittuAsukas.php?id='.$member['id'].'">Muokkaa</a>'; ?></td>
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