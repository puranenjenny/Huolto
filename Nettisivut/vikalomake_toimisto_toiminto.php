   <?php 

    require "php/config.php";
    include 'php/hae_kayttajaid.php';

        $kayttaja_id = $kayttaja_id; //arvo haetaan hae_kayttajaid.php:stä
        $kuvaus = $_REQUEST['kuvaus']; // arvo otetaan lomakkeesta
        $taloyhtio_id = $_REQUEST['taloyhtio']; // arvo alavalikosta
        $tila_id = $_REQUEST['tila']; // arvo alavalikosta
        $yleisavaimen_kaytto = "kyllä"; //vakio
        $puhelin = "09 4545 669"; //toimiston numero
        $tehtavan_tilanne_id = $_REQUEST['Tilanne']; // arvo otetaan lomakkeesta
        $tyontekija = $_REQUEST['tyontekija']; // arvo otetaan lomakkeesta

        //kysely
        $sql = "INSERT INTO tehtavat (kayttaja_id, kuvaus, taloyhtio_id, tila_id, yleisavaimen_kaytto, numero, tehtavan_tilanne_id, tyontekija_id) VALUES ('$kayttaja_id', '$kuvaus', '$taloyhtio_id', '$tila_id', '$yleisavaimen_kaytto', '$puhelin', '$tehtavan_tilanne_id', '$tyontekija')";
        $lataa = $yhteys->prepare($sql);
        $lataa->execute();

        
        header("location:ui-uudet-ilmot.php");


        $yhteys = null;

?>