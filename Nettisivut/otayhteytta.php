<?php include 'header.php';?>


<div class="connect_tausta">

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>


  <div class="row  mx-0">
      <div class="col text-center"> <h3>Kiinnostuitko?<br><br></h3></div>
  </div>

  <div class="row  mx-0">
    <div class="col text-center"> <p><b>Täytä alla oleva lomake niin otamme teihin yhteyttä mahdollisimman pian. <br>Yhdessä voimme luoda parhaan mahdollisen palvelupaketin taloyhtiönne tarpeiden mukaisesti.</b></p>
  </div>

<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="bg-cover text-white d-flex align-items-center" id="taustakuva1">
  <div class="container1">
    <div class="row justify-content-center">
      <div class="text-center lomake_tausta">
        <form class="form" action="otayhteytta_toiminto.php" method="post">
          <div class="form-group">
            <label for="name">Sinun nimesi / Yrityksesi nimi *</label>
            <input id="name" type="text" name="name" required class="form-control"><br>
          </div>
          <div class="form-group">
            <label for="email">Sähköposti *</label>
            <input id="email" type="text" name="email" required class="form-control"><br>
          </div>
          <div class="form-group">
            <label for="numero">Puhelinnumero</label>
            <input id="numero" type="text" name="numero" class="form-control"><br>
          </div>
          <div class="form-group">
            <label id="viesti" for="viesti">Viesti</label>
            <textarea name="viesti" id="viesti" cols="50" rows="8" class="form-control"></textarea><br>
          </div>
          <button type="submit" class="btn btn1">Lähetä</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row vali  mx-0"></div>
<div class="row vali  mx-0"></div>

<div class="row kommentti2 text-center  mx-0">
    <h3>Kun tarvitset kokeneita ja ammattitaitoisia kiinteistöhuoltajia, voit aina luottaa R. Autio Oy:hyn.</h3>
</div> 

</div>
</div>

  


<?php include 'footer.php';?>