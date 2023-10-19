<?php 

$checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$userID'  LIMIT 1";
$result = mysqli_query($db, $checkAdminStatus);
$adminStatus = mysqli_fetch_array($result);

if($adminStatus[0] != 'A' && $adminStatus[0] != 'S'){
  header("Location: ../401.php");
  die;}

  
 ?>