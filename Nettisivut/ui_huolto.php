<?php include 'header_ui_huolto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<?php include 'php/tehtavat_taloyhtioittain.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center otsikko">
  <h3>Tervetuloa omalle työpöydälle <?php echo htmlspecialchars($etunimi . " " . $sukunimi . "!"); ?></h3> <!--tulostetaan Hei etunimi sukunimi -->
  </div>

<div class="bg-cover text-white d-flex">
    <div class="container5">

    <div class="row justify-content-center mx-0">
        <div class="col-xl-8 col-lg-8 col-8 table-responsive"><!--table-responsive-->
        <div class="container6">
                <div class="row justify-content-center mx-0">
                    <h2 class="avoimet_tiketit">Oma työlista</h2><br><br><br></div>
                <div class="row justify-content-center mx-0"> 
                <table class="table table-striped huolto_taulu">
                    <tr>
                    <th>ID</th> 
                    <th>Viankuvaus</th>
                    <th>Ilmoittaja</th>
                    <th>Osoite</th>
                    <th>Rappu / Tila</th>
                    <th>Yleisavain</th>
                    <th>Puh. numero</th>
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
                                        <td><?php echo "<b>" . $member['ID'] . "</b>"; ?></td>
                                        <td><?php echo $member['Viankuvaus']; ?></td>
                                        <td><?php echo $member['Jattaja']; ?></td>
                                        <td><?php echo $member['Osoite']; ?></td>
                                        <td><?php echo $member['Tila']; ?></td>
                                        <td><?php echo $member['Yleisavaimen_kaytto']; ?></td>
                                        <td><?php echo $member['Numero']; ?></td>
                                        <td><a href="paivita_tehtava_lomake.php?tehtava_id=<?php echo $member['ID']; ?>" class="btn btn2 btn-info">Päivitä</a></td>  
                                        </tr>
                                         <?php
                                            }
                                            }
                                        }?>
                            </table>
                </div></div>
        </div> <!--table-responsive-->
       <div class="container7 col-xl-4 col-lg-12 col-12 justify-content-center mx-0 ">     
        <div class="row justify-content-center mx-0">
                    <h2>Tehtävät taloyhtiöittäin</h2><br><br><br></div>
        <!-- Luo taloyhtiöiden valikko -->
        <form method="POST">
            <label for="taloyhtio">Valitse taloyhtiö:</label><br>
            <select class="rounded-select" name="taloyhtio" id="taloyhtio">
                <?php foreach ($taloyhtiot as $taloyhtio) { ?>
                    <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>"><?php echo "&nbsp;". $taloyhtio['nimi'] . "&nbsp;"; ?></option>
                <?php } ?>
            </select><br><br>
            <button class="btn btn2 btn-info" type="submit">Hae tehtävät</button>
        </form>
    
        <?php if(isset($tehtavat)) {
        $valittu_taloyhtio = '';
        foreach ($taloyhtiot as $taloyhtio) {
        if($taloyhtio['taloyhtio_id'] == $_POST['taloyhtio']) {
            $valittu_taloyhtio = $taloyhtio['nimi'];
            break;
        }
        }?>
            <!-- Luo lista avaamattomista tehtävistä -->
            <h2><br> <?php echo $valittu_taloyhtio ?></h2>
            <ul>
                <?php foreach ($tehtavat as $tehtava) { ?>
                    <li><?php echo "Tehtävän ID: " . $tehtava['tehtava_id']; ?></li>
                    <li><?php echo "Sijainti: " . $tehtava['tila_nimi']; ?></li>
                    <li><?php echo "Kuvaus: <br>" . $tehtava['kuvaus']; ?></li>
                    <li><?php echo "Tehtävän tila: <br>" . $tehtava['tehtavan_tilanne']; ?></li>
                    <li><?php echo "Yleisavaimen käyttö: <br>" . $tehtava['yleisavaimen_kaytto']; ?><br><br></li>
<?php }} ?>

</ul>

        </div>
    
</div>
</div>
</div>  

<div class="row vali mx-0"></div>
<div class="row vali mx-0"></div>
</div> 





<?php include 'footer.php';?>