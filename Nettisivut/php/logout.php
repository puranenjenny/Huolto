<?php 
session_start(); //aloitetaan sessio
session_unset(); //poistetaan kaikki sessio muuttujat
session_destroy(); //tuhotaan sessio

header("location: ../index.php"); //ohjataan käyttäjä takaisin etusivulle header komennolla
?>