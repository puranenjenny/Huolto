<?php 
include 'php/config.php';
include 'header.php';
include 'php/hae_kayttajaid.php';
?>

<head>
    <title>Onnistunut lisäys</title>
</head>
 
<body>
  <div class="text-center container4 center">
   <?php 
    try{  
        //$tehtava_id = NULL; 
        $kayttaja_id = $kayttaja_id; //arvo haetaan hae_kayttajaid.php:stä
        $kuvaus = $_REQUEST['kuvaus']; // arvo otetaan lomakkeesta
        $taloyhtio = $_REQUEST['taloyhtio']; //???????????
        $tila = $_REQUEST['tila']; //???????????
        $tehtavan_tilanne_id = 1; //vakio 1 eli käsittelemätön
        
        //lisäyskysely
        $sql = "INSERT INTO tehtavat (kayttaja_id, kuvaus, taloyhtio, tila, tehtavan_tilanne_id) VALUES ('$kayttaja_id', '$kuvaus', '$taloyhtio', '$tila', '$tehtavan_tilanne_id')";

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