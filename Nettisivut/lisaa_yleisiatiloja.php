<?php 
include "php/config.php";
include 'header_ui_toimisto.php';?>


<div class="bg-cover text-white d-flex align-items-center">
    <div class="container10">
        <div class="row justify-content-center mx-0">
        <div class="container11">
            <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Taloyhtiön tilat:</h3>
                <div class="lomake_tausta_tila lomake_tila table-responsive">
                        <div class="d-flex justify-content-center lista_tila">
                            <table class="text-center table table-striped table-vika table-yhteys">
                                <tr>
                                <th>ID</th>
                                <th>Tila</th>
                                <th></th>
                                </tr>
                                     <?php
                                         $JSON_tilat = file_get_contents("php/tila_listaus.json");
                                         $members = json_decode($JSON_tilat, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['ID']; ?></td>   
                                                     <td><?php echo $member['Tila']; ?></td>
                                                     <td><?php echo '<a href="php/poistaTila.php?id='.$member['ID'].'" class="btn btn-danger">Poista</a>'; ?></td>
                                                     </tr>
                                             <?php
                                             }
                                         }
                                         }
                                    ?>

                            </table>
                        </div>
                    <br>
                    
                        <div class="d-flex justify-content-center">
                            <form class="form" action="php/lisaaTila.php" method="POST">
                            <div class="form-group form-floating">
                                <div class="label-wrapper">
                                    <label for="tila">Tilan nimi:</label>
                                </div>
                                <input class="rounded-input leveys-select"type="text" name="tila" value="">
                                </div>
                                <br>
                            <div class="form-group form-floating">
                                <a class="btn btn-primary" href="muokkaaTaloyhtio.php">Takaisin</a>
                                <button name="tallenna" type="submit" class="tila-nappi btn btn-success">Lisää</button>
                            </div>
                            </form>                        
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<div class="row vali  mx-0"></div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Muistathan sulkea toimiston valot lähtiessäsi! ☺</h3>
</div> 

<?php include 'footer.php';?>