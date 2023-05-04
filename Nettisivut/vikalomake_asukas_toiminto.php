<?php 
include("php/config.php");
include 'header.php';
?>

<head>
    <title>Onnistunut lisäys</title>
</head>
 
<body>
  <div class="text-center container4 center">
   <?php 
    try{  
        $tehtava_id = NULL; 
        $kuvaus = $_REQUEST['kuvaus'];// Arvot otetaan lomakkeesta
        $yleisavaimen_kaytto = $_REQUEST['yleisavaimen_kaytto'];
        $numero = $_REQUEST['numero'];
        $tehtavan_tilanne_id = 1;
        
        //lisäyskysely
        $sql = "INSERT INTO tehtavat (kuvaus, yleisavaimen_kaytto, numero, tehtavan_tilanne_id) VALUES ('$kuvaus', '$yleisavaimen_kaytto', '$numero', '$tehtavan_tilanne_id')";

        $lataa = $yhteys->prepare($sql);

        if($lataa->execute()){
            echo "<h3>Vikailmoituksesi on vastaanotettu. <br>" //ilmoitus teksti onnistuneesta lisäyksestä
            . " Palaamme asiaan mahdollisimman pian! <br> </h3>";
        } else {
            echo "ERROR: Virhe! Viestiä ei lähetetty tietokantaan $sql. "; //muuten kitisee jos ei onnistu 
        }
     
        $yhteys = NULL; // yhteyden sulku
  
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
?>
  </div>
</body>
 

<?php include 'footer.php';?>