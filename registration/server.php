<?php

$domains = array('knights.ucf.edu', 'program.harvard.edu');
$domainNames = array('University of Central Florida', 'Harvard University');

// SIGNUP USER
session_start();

$userid = "";
$universityName = "";
$password_2 = "";
$password_1 = "";
$errors = array(); 


$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());


if (isset($_POST['reg_user'])) {
  $universityName = mysqli_real_escape_string($db, $_POST['universityName']);
  $userid = mysqli_real_escape_string($db, $_POST['userID']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match!");
  }

  
  for($i = 0; $i < sizeof($domains); $i++)
  {
      if(strtolower($universityName) === $domains[$i]){
        $universityName = $domainNames[$i];
        break;}
  }

  if($i === sizeof($domains))
    array_push($errors, "Invalid Domain");

  $user_check_query = "SELECT * FROM users WHERE userID ='$userid' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if (!empty($user)) {
      array_push($errors, "User ID already exists!");
    }


  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "INSERT INTO Users (universityName, userID, password, UserStatus) 
  			  VALUES('$universityName', '$userid', '$password', 'U')" ;
  	mysqli_query($db, $query);
    $_SESSION['userID'] = $userid;
  	$_SESSION['success'] = "You are now logged in";
    echo "<script>alert('Sign Up Successful');</script>";
    header('location: ../index.php');

  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userID']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE userID = '$userid' AND password = '$password'";
  	$results = mysqli_query($db, $query);
    $check = mysqli_num_rows($results);
  	if ($check != 0) {
  	  $_SESSION['userID'] = $userid;
  	  $_SESSION['success'] = "You are now logged in";
      echo "<script>alert('Sign Up Successful');</script>";
  	  header('location: ../index.php');
  	}else 
  		array_push($errors, "Wrong user ID/password combination");
  	
  }
}

?>