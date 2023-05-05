<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>

    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Käyttäjien hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
                <button  onclick="saveScrollPosition()" class="mx-2 btn btn-warning nappi"><a class="nappi" href="ui-naytakayttajat.php">Näytä asukkaat</a></button>
                <button  onclick="saveScrollPosition()" class="mx-2 btn btn-warning nappi"><a class="nappi" href="ui-naytaisannoitsijat.php">Näytä isännöitsijät</a></button>
                <button  class="mx-2 btn btn-warning nappi"><a class="nappi" href="lisaa_asukas_lomake.php">Lisää asukas</a></button>
            </div>
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Asukkaat:</h3>
                <div class="lomake_tausta lomake_vika">
                            <table class="text-end table table-striped table-vika table-yhteys">
                                <tr>
                                <th>Asukasnumero</th>
                                <th>Etunimi</th>
                                <th>Sukunimi</th>
                                <th>Taloyhtiö</th>
                                <th></th>
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
                                                     <td><button class="btn btn-warning"><?php echo '<a class="nappi" href="valittuKayttaja.php?id='.$member['id'].'">Muokkaa</a>'; ?></button></td>
                                                     <td><button class="btn btn-danger" onclick="saveScrollPosition()"><?php echo '<a class="nappi" href="php/poista_kayttaja.php?id='.$member['id'].'">Poista</a>'; ?></button></td>
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