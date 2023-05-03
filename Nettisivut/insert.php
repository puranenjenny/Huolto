<!DOCTYPE html>
<html>
 
<head>
    <title>Onnistunut lisäys</title>
</head>
 
<body>
  <center>
   <?php include("php/config.php"); 
            
        // Arvot otetaan lomakkeesta.
        $yp_nimi =  $_REQUEST['name'];
        $yp_email = $_REQUEST['email'];
        $yp_numero =  $_REQUEST['numero'];
        $yp_viesti = $_REQUEST['viesti'];
         
        //lisäyskysely
        $sql = "INSERT INTO yhteydenottopyynnot  VALUES ('$yhteydenottopyynto_id','$yp_nimi',
            '$yp_email','$yp_numero','$yp_viesti')";

        $lataa = $yhteys->prepare($sql);

       if($lataa->execute()){
          echo "<h3>Yhteydenottopyyntösi on vastaanotettu. <br>" //ilmoitus teksti onnistuneesta lisäyksestä.
        . " Pyrimme vastaamaan sinulle 3 arkipäivän kuluessa.</h3>";
}     else{
       echo "ERROR: Hush! Sorry $sql. " . $lataa->error; //muuten kitisee jos ei onnistu
}
         
// yhteyden sulku
$yhteys = NULL;
?>
  </center>
</body>
 
</html>