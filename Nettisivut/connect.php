<?php
include 'header.php';?>


<div class="connect_tausta">

<div class="row vali"></div>


  <div class="row">
      <div class="col-4"></div>
      <div class="col text-center"> <h3>Kiinnostuitko?<br><br></h3></div>
      <div class="col-4"></div> 
  </div>

  <div class="row">
    <div class="col-3"></div>
    <div class="col text-center"> <p><b>Täytä alla oleva lomake niin otamme teihin yhteyttä mahdollisimman pian. Yhdessä voimme luoda parhaan mahdollisen palvelupaketin taloyhtiönne tarpeiden mukaisesti.</b></p></div>
    <div class="col-3"></div> 

<div class="row vali"></div>


<div class="row text-center">
  <div class="col-lg-6 d-flex align-items-center">
    <div>
      <img src="img/helsinki10.jpg" alt="helsinki10" class="helsinki10">
    </div>
  </div>

  <div class="col-lg-6 text-center lomake_tausta d-flex align-items-center">
    <form class="form">
      <div class="form-group">
        <label for="name">Sinun nimesi / Yrityksesi nimi *</label>
        <input id="name" type="text" name="name" required class="form-control"><br>
      </div>
      <div class="form-group">
        <label for="email">Sähköposti *</label>
        <input id="email" type="text" name="email" required class="form-control"><br>
      </div>
      <div class="form-group">
        <label for="puh">Puhelinnumero</label>
        <input id="puh" type="text" name="puh" class="form-control"><br>
      </div>
      <div class="form-group">
        <label id="contect" for="content">Viesti</label>
        <textarea name="content" id="content" cols="50" rows="8" class="form-control"></textarea><br>
      </div>
      <button type="submit" class="btn btn1">Lähetä</button>
    </form>
  </div>
</div>


  <div class="row vali"></div>
  <div class="row vali"></div>
</div>
</div>

  


<?php include 'footer.php';?>