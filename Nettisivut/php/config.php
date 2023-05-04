<?php
if(!isset($_SESSION)){  //jos session ei ole käynnissä, käynnistä se
    session_start(); 
}

try{
    $palvelin = "localhost";
    $tietokanta = "kiinteistohuolto2";
    $tunnus = "root";
    $salasana = "";

    $yhteys = new PDO("mysql:host=$palvelin; dbname=$tietokanta", $tunnus, $salasana);
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // print "<p>Yhteys onnistui!</p>";

}catch(PDOException $e){
    print "<p> Yhteyden avaaminen epäonnistui. </p>" . $e -> getMessage();
}

?>