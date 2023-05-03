<?php include("php/config.php");
      include 'header.php';?>
 
<head>
    <title>Onnistunut lisäys</title>
</head>
 
<body>
  <div class="text-center container4 center">
   <?php 
    try{   
        $yp_nimi =  $_REQUEST['name'];// Arvot otetaan lomakkeesta
        $yp_email = $_REQUEST['email'];
        $yp_numero =  $_REQUEST['numero'];
        $yp_viesti = $_REQUEST['viesti'];
        $yhteydenottopyynto_id = NULL; 
         
        //lisäyskysely
        $sql = "INSERT INTO yhteydenottopyynnot  VALUES ('$yhteydenottopyynto_id','$yp_nimi',
            '$yp_email','$yp_numero','$yp_viesti')";

        $lataa = $yhteys->prepare($sql);

       if($lataa->execute()){
          echo "<h3>Yhteydenottopyyntösi on vastaanotettu. <br>" //ilmoitus teksti onnistuneesta lisäyksestä
        . " Pyrimme vastaamaan sinulle 3 arkipäivän kuluessa.<br> </h3>";
  }     else{
       echo "ERROR: Virhe! Viestiä ei lähetetty tietokantaan $sql. "; //muuten kitisee jos ei onnistu 
  }
     
  $yhteys = NULL; // yhteyden sulku
  
  } catch(PDOException $e){
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
?>
  </div>
</body>
 

<?php include 'footer.php';?>