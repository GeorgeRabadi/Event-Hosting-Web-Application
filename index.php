<?php

session_start();

if (!isset($_SESSION['userID'])){
    header("Location: registration/login.php");
    die;}
else{
"<script>You are now Logged in!<script>alert";
header("Location: createUniversity/createUniversity.php");}


?>