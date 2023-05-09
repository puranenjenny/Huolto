<?php 
include "php/config.php";
include "php/hae_tyontekijat.php";
include 'header_ui_toimisto.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Muokkaa vikailmoitusta<br><br></h3></div>
  </div>

<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center">
  <div class="container1">
    <div class="row mx-0">
      <div class="lomake_tausta_tehtava d-flex justify-content-center">
      <?php
                $JSON_paivita = file_get_contents("php/valittuVika.json");
                $users = json_decode($JSON_paivita, true);

                if(count($users) != 0){
                    foreach($users as $key1){
                        foreach($key1 as $user){

                            ?>
                            <form class="lomake_tehtava" action="php/teePaivitysVikaIlmo.php" method="POST">
                            <tr>
                                <td>Viankuvaus</td><br>
                                <td><textarea disabled class="kuvaus" type="textarea" name="viankuvaus" required value=""><?php echo $user['Viankuvaus']; ?></textarea></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Osoite</td><br>
                                <td><input disabled type="text" name="osoite" value="<?php echo $user['Osoite']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Yleisavaimen käyttö</td><br>
                                <td><input disabled type="text" name="yleisavain" value="<?php echo $user['Yleisavain']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Puhelinnumero:</td><br>
                                <td><input disabled type="text" name="puhelin" value="<?php echo $user['Puhelin']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Tilanne:</td><br>
                                <td><select id="Tilanne" name="tilanne" >
                                        <option value="<?php echo $user['TilaID']; ?>"><?php echo $user['Tilanne']; ?></option>
                                        <option value="1">Käsittelemättä</option>
                                        <option value="2">Avoin</option>
                                        <option value="3">Työn alla</option>
                                        <option value="4">Valmis</option>                                   
                                    </select></td></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Työntekija:</td><br>
                                <td>
                                    <select id="Tyontekija" name="tyontekija" >
                                        <option value="">&nbsp;Valitse huoltohenkilö&nbsp;</option>
                                        <?php
                                                $JSON_tyontekijat = file_get_contents("tyontekijat.json");
                                                $tyontekijat = json_decode($JSON_tyontekijat, true);


                                                if(count($tyontekijat) != 0){
                                                    foreach($tyontekijat as $tyontekija){
                                                        foreach($tyontekija as $user1){

                                        ?>
                                        <option value="<?php echo$user1['ID']; ?>"><?php echo '&nbsp;' . $user1['ID'] . ' ' . $user1['Etunimi'] . ' ' .$user1['Sukunimi'] . '&nbsp;'; ?></option>        
                                        <?php
                        }
                    }
                }
            ?>
                                    
                                    </select></td>
                            </tr>
                            <br><br>
                            <tr>
                                <td>
                                <a class="btn btn-primary" href="ui-uudet-ilmot.php">Takaisin</a>
                                <button name="tallenna" type="submit" class="mx-3 btn btn-success">Tallenna</button>
                                <?php echo '<a href="php/poistaVikaIlmo.php?tehtava_id='.$user['ID'].'" class="btn btn-danger">Poista</a>'; ?>
                                </td><br>
                            </tr>
                            </form>
                            <?php
                        }
                    }
                }
            ?>

        </table>


</div>
</div>
  


<?php include 'footer.php';?>