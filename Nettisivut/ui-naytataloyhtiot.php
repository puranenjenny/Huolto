<?php 
include 'header_ui_toimisto.php';
?>
<script src="js/kirjautumiserror.js"></script>

    <div class="container10 bg-cover text-white d-flex justify-content-center align-items-center">
        <div class="container9 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Käyttäjien hallinta</h3>
            <div class="d-flex lomake_tausta napit_kayttaja">
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytakayttajat.php">Näytä asukkaat</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytaisannoitsijat.php">Näytä isännöitsijät</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytataloyhtiot.php">Näytä taloyhtiöt</a>                
                <a class="m-2 btn nappi" href="lisaa_asukas_lomake.php">Lisää asukas</a>
                <a class="m-2 btn nappi" href="lisaa_isannoitsija_lomake.php">Lisää isännöitsijä</a>
                <a class="m-2 btn nappi" href="lisaa_taloyhtio_lomake.php">Lisää taloyhtiö</a>
                
            </div>
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Taloyhtiöt:</h3>
                <div class="lomake_tausta lomake_vika table-responsive">
                            <table class="text-center table table-striped table-vika table-yhteys">
                                <tr>
                                <th>Taloyhtiönumero</th>
                                <th>Nimi</th>
                                <th>Osoite</th>
                                <th>Postinumero</th>
                                <th>Kaupunki</th>
                                <th>Isannöitsijä</th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/taloyhtiot.php');
                                         $members = json_decode($JSON_taloyhtiot, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>   
                                                     <td><?php echo $member['Nimi']; ?></td>
                                                     <td><?php echo $member['Osoite']; ?></td>
                                                     <td><?php echo $member['Postinumero']; ?></td>
                                                     <td><?php echo $member['Kaupunki']; ?></td>
                                                     <td><?php echo $member['Etunimi'].' '.$member['Sukunimi']; ?></td>
                                                     <td><?php echo '<a class="btn btn-warning" href="php/valittuTaloyhtio.php?id='.$member['ID'].'">Muokkaa</a>'; ?></td>
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