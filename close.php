<?php 
    // seción iniciada.
    session_start();
    // se destruye la seción.
    session_destroy();
    // redirigimos al usuario de nuevo al login.
    header('location:login.php');

?>
