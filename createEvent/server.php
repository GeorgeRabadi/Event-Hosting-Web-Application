<?php

session_start();

if (!isset($_SESSION['userID'])){
    header("Location: registration/login.php");
    die;}

$host = $_SESSION['userID'];

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());

$checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$host'  LIMIT 1";
$result = mysqli_query($db, $checkAdminStatus);
$adminStatus = mysqli_fetch_array($result);

if($adminStatus[0] != 'A' && $adminStatus[0] != 'S'){
  header("Location: ../index.php");
  die;}


$name = "";
$rsoName = "";
$category = "";
$description = "";
$time = "";
$date = "";
$locationName = "";
$lat = "";
$long = "";
$email = "";
$phoneNum = "";
$type = "";
$errors = array(); 

if (isset($_POST['create_event'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $rsoName = mysqli_real_escape_string($db, $_POST['rsoName']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $locationName = mysqli_real_escape_string($db, $_POST['locationName']);
  $lat = mysqli_real_escape_string($db, $_POST['lat']);
  $long = mysqli_real_escape_string($db, $_POST['long']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phoneNum = mysqli_real_escape_string($db, $_POST['phoneNum']);
  $type = mysqli_real_escape_string($db, $_POST['type']);

  
  $query = "SELECT * FROM events WHERE name ='$name' LIMIT 1";
  $result = mysqli_query($db, $query);
  $eName = mysqli_fetch_assoc($result);
  

  if (!empty($eName)) {
      array_push($errors, "Event name already exists!");
    }


  $query = "SELECT * FROM rsomembership WHERE rsoName ='$rsoName' and userID = '$host' LIMIT 1";
  $result = mysqli_query($db, $query);
  $rName = mysqli_fetch_assoc($result);


  if (empty($rName)) {
    array_push($errors, "RSO does not exist!");
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

  	$query = "INSERT INTO events (Host, rsoName, name, category, description, time, date, locationName, email, phoneNum, type)  
    VALUES('$host', '$rsoName', '$name', '$category', '$description', '$time', '$date', '$locationName', '$email', '$phoneNum', '$type')";
  	mysqli_query($db, $query);
    echo "<script>alert('Event Created Successfully');</script>";
    
  }
}


?>