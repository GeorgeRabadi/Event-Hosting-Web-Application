<?php

session_start();

if (!isset($_SESSION['userID'])){
    header("Location: registration/login.php");
    die;}
else{
echo "<script>You are now Logged in!<script>alert";
header("Location: displayRSOs/displayRSOs.php");}


?>