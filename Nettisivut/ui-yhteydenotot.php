<?php include 'header_ui_toimisto.php';?>

<div class="connect_tausta">

<div class="row vali  mx-0"></div>
  <div class="row  mx-0 text-center">
      <div class="col text-center"> <h3><h3>Tervetuloa omalle työpöydälle <?php echo $login_session; ?></h3></h3></div>

  </div>

<div class="row vali mx-0"></div>

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
                                                     <td><a href="#" class="btn btn-danger">Poista</a></td>
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