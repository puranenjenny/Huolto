<?php

try{
$palvelin = "localhost";
$tietokanta = "kiinteistohuolto2";
$tunnus = "root";
$salasana = "";

$yhteys = new PDO("mysql:host=$palvelin; dbname=$kiinteistohuolto2", $tunnus, $salasana);
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOExpeption $e){
    print "<p> Yhteyden avaaminen epäonnistui. </p>" . $e -> getmessage();
}


?>