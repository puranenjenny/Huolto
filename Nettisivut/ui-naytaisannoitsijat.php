<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>


    <div class="container10 bg-cover text-white d-flex justify-content-center align-items-center">
        <div class="container9 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Käyttäjien hallinta</h3>
            <div class=" col-lg-3 lomake_tausta napit_kayttaja">
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytakayttajat.php">Näytä asukkaat</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytaisannoitsijat.php">Näytä isännöitsijät</a>
                <a onclick="saveScrollPosition()" class="m-2 btn nappi" href="ui-naytataloyhtiot.php">Näytä taloyhtiöt</a>                
                <a class="m-2 btn nappi" href="lisaa_asukas_lomake.php">Lisää asukas</a>
                <a class="m-2 btn nappi" href="lisaa_isannoitsija_lomake.php">Lisää isännöitsijä</a>
                <a class="m-2 btn nappi" href="lisaa_taloyhtio_lomake.php">Lisää taloyhtiö</a>
            </div>
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Isännöitsijät:</h3>
                <div class="lomake_tausta lomake_vika table-responsive">
                            <table class="text-center table table-striped table-vika table-yhteys">
                                <tr>
                                <th>Isännöitsijänumero</th>
                                <th>Etunimi</th>
                                <th>Sukunimi</th>
                                <th>Puhelin</th>
                                <th></th>
                                </tr>
                                <?php
                                    include('php/isannoitsijat_listaus.php');
                                    $members = json_decode($JSON_isannoitsijat, true);

                                    if (count($members) != 0) {
                                        foreach ($members as $key) {
                                            foreach ($key as $member) {
                                                if ($member['id'] != 12) { // tarkistetaan että "ei isännöitsijää näytetä"
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $member['id']; ?></td>
                                                        <td><?php echo $member['Etunimi']; ?></td>
                                                        <td><?php echo $member['Sukunimi']; ?></td>
                                                        <td><?php echo $member['Puhelin']; ?></td>
                                                        <td><?php echo '<a class="btn btn-warning" href="php/valittuIsannoitsija.php?id=' . $member['id'] . '">Muokkaa</a>'; ?></td>
                                                    </tr>
                                                    <?php
                                                }
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