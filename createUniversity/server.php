<?php

session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}


$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());

$host = $_SESSION['userID'];

$checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$host'  LIMIT 1";
$result = mysqli_query($db, $checkAdminStatus);
$adminStatus = mysqli_fetch_array($result);

if($adminStatus[0] != 'S'){
  header("Location: ../index.php");
  die;}


$name = "";
$description = "";
$locationName = "";
$lat = "";
$long = "";
$numStudents = "";
$errors = array(); 

if (isset($_POST['create_profile'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $locationName = mysqli_real_escape_string($db, $_POST['locationName']);
  $lat = mysqli_real_escape_string($db, $_POST['lat']);
  $long = mysqli_real_escape_string($db, $_POST['long']);
  $numStudents = mysqli_real_escape_string($db, $_POST['numStudents']);

  $user_check_query = "SELECT * FROM university WHERE universityName ='$name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

  if (!empty($user)) {
      array_push($errors, "University Name Already Exists!");
    }


  if (count($errors) == 0) {

    $query = "SELECT * FROM location WHERE locationName = '$locationName' OR (latitude = '$lat' AND longitude = '$long') LIMIT 1";
    $results = mysqli_query($db, $query);
    $check = mysqli_num_rows($results);

    if($check == 0)
    {
        $query = "INSERT INTO location (locationName, latitude, longitude) 
        VALUES('$locationName', '$lat', '$long')";
        mysqli_query($db, $query);
    }


  	$query = "INSERT INTO university (universityName, locationName,  description, numStudents)  
    VALUES( '$name', '$locationName', '$description', '$numStudents')";
  	mysqli_query($db, $query);
    echo "<script>alert('University Created Successfully');</script>";
    
  }
}


?>