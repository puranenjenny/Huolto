<?php include 'header_ui_toimisto.php';?>
<?php include 'php/hae_tyontekijan_nimi.php';?>
<script src="js/kirjautumiserror.js"></script>


    <div class="bg-cover text-white d-flex align-items-center">
        <div class="container1 container_table">
            <div class="row justify-content-center mx-0">
                <h3 class="col-lg-12 lomake_tausta lomake_vika header_vika">Saapuneet yhteydenottopyynnöt</h3>
                <div class="lomake_tausta lomake_vika">
                            <table class="text-end table table-striped table-vika table-yhteys">
                                <tr>
                                <th>ID</th>
                                <th>Nimi</th>
                                <th>Sähköposti</th>
                                <th>Puhelinnumero</th>
                                <th>Viesti</th>
                                <th></th>
                                </tr>
                                     <?php
                                         include('php/yhteydenottopyyntolistaus.php');
                                         $members = json_decode($JSON_viesti, true);

                                         if(count($members) != 0){
                                         foreach($members as $key){
                                             foreach($key as $member){
                                             ?>
                                                     <tr>
                                                     <td><?php echo $member['id']; ?></td>
                                                     <td><?php echo $member['Nimi']; ?></td>
                                                     <td><?php echo $member['Email']; ?></td>
                                                     <td><?php echo $member['Numero']; ?></td>
                                                     <td><?php echo $member['Viesti']; ?></td>
                                                     <td><?php echo '<a onclick="saveScrollPosition()" class="btn btn-danger" href="php/poista_yhteydenotto.php?id='.$member['id'].'">Poista</a>'; ?></td>
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