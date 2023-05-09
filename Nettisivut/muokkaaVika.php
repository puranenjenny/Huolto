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

                //I don't know if this is really nessessary, but this was the way I got this to work as I wanted.
                if(count($users) != 0){
                    foreach($users as $key1){
                        foreach($key1 as $user){

                            ?>
                            <form class="lomake_tehtava" action="php/teePaivitys.php" method="POST">
                            <tr>
                                <td>Viankuvaus</td><br>
                                <td><textarea class="kuvaus" type="textarea" name="Viankuvaus" required value=""><?php echo $user['Viankuvaus']; ?></textarea></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Osoite</td><br>
                                <td><input type="text" name="Osoite" value="<?php echo $user['Osoite']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Yleisavaimen käyttö</td><br>
                                <td><input type="text" name="Yleisavain" value="<?php echo $user['Yleisavain']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Puhelinnumero:</td><br>
                                <td><input type="text" name="Puhelin" value="<?php echo $user['Puhelin']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Tilanne:</td><br>
                                <td><input type="text" name="Puhelin" value="<?php echo $user['Tilanne']; ?>"></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Työntekija:</td><br>
                                <td>
                                    <select id="Tyontekija" name="taloyhtio" class="rounded-select">
                                        <option value="">&nbsp;Työntekijät&nbsp;</option>
                                            <?php foreach ($tyontekijat as $tyontekija): ?>
                                                <option value="<?php echo $tyontekija['tyontekija_id']; ?>">
                                            <?php echo '&nbsp;' . $tyontekija['etunimi'] . ' ' .$tyontekija['sukunimi'] . '&nbsp;'; ?>
                                            </option>
                                             <?php endforeach; ?>
                                    </select></td>
                            </tr>
                            <br>
                            <tr>
                                <td></td><br>
                                <td><button href="ui_toimisto.php" name="takaisin" class="btn btn-primary">Takaisin</button></td>
                                <td><button name="tallenna" type="submit" class="mx-3 btn btn-warning">Tallenna</button></td>
                                <td><button href="#" name="poista" type="submit" class="btn btn-danger">Poista</button></td>
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