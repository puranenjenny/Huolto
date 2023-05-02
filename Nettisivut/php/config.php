<?php
   // header("Content-Type: text/html; charset=utf-8"); //tarviiko asettaa erikseen UTF-8?

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