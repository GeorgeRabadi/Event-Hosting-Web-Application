<?php

include('../superAdminCheck.php');

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