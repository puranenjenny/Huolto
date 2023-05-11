<?php 
session_start();
session_unset(); //poistetaan kaikki sessio muuttujat
if(session_destroy()) {
    header("Location: ../index.php");
}
?>