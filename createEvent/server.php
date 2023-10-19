<?php

include("../adminCheck.php");

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

    
  $query = "SELECT * FROM events WHERE name ='$name' LIMIT 1";
  $result = mysqli_query($db, $query);
  $eName = mysqli_fetch_assoc($result);

  if (!empty($eName)) {
    array_push($errors, "Event already requested!");
  }


  $query = "SELECT * FROM rsomembership WHERE rsoName ='$rsoName' and userID = '$userID' LIMIT 1";
  $result = mysqli_query($db, $query);
  $rName = mysqli_fetch_assoc($result);


  if (empty($rName) && $type != "Public") {
    array_push($errors, "RSO does not exist or is not Owned by You!");
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

  	if($type != "Public")
    {
      $query = "INSERT INTO events (Host, rsoName, name, category, description, time, date, locationName, email, phoneNum, type)  
      VALUES('$userID', '$rsoName', '$name', '$category', '$description', '$time', '$date', '$locationName', '$email', '$phoneNum', '$type')";
      mysqli_query($db, $query);
      echo "<script>alert('Event Created Successfully');</script>";
    }
    else if($adminStatus[0] == 'S')
    {

      $query = "SET foreign_key_checks = 0";
      mysqli_query($db, $query);

      $query = "INSERT INTO events (Host, rsoName, name, category, description, time, date, locationName, email, phoneNum, type)  
      VALUES('$userID', '', '$name', '$category', '$description', '$time', '$date', '$locationName', '$email', '$phoneNum', '$type')";
      mysqli_query($db, $query);
      echo "<script>alert('Event Created Successfully');</script>";

      $query = "SET foreign_key_checks = 1";
      mysqli_query($db, $query);

    }
    else
    {
      $query = "INSERT INTO requestedevents (Host, rsoName, name, category, description, time, date, locationName, email, phoneNum, type)  
      VALUES('$userID', '', '$name', '$category', '$description', '$time', '$date', '$locationName', '$email', '$phoneNum', '$type')";
      mysqli_query($db, $query);

      echo "<script>alert('Awaiting Super Admin Approval');</script>";
    }

    
  }
}


?>