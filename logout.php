<?php 

    session_start();
    session_destroy();
    header("Location: registration/login.php");

 ?>