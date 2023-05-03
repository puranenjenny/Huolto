
<?php 
session_start(); //aloitetaan sessio
session_unset(); //poistetaan kaikki sessio muuttujat
session_destroy(); //tuhotaan sessio

header("location: ../index.php"); //ohjataan käyttäjä takaisin etusivulle header komennolla
?>

<?php
   //session_start(); ------------esimerkki sivulta https://www.tutorialspoint.com/php/php_mysql_login.htm 
   
   //if(session_destroy()) {
    //  header("Location: ../index.php");
  // }
?>