<?php

// SIGNUP USER
session_start();

$fullname = "";
$userid = "";
$email = "";
$gender = "";
$errors = array(); 


$db = mysqli_connect('cop4710project-server.mysql.database.azure.com', 'aqgyfhsoav', 'FYB12SMDS8TQ70R0$', 'cop4710project-database');

if (mysqli_connect_errno()) 
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());


if (isset($_POST['reg_user'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match!");
  }


  $user_check_query = "SELECT * FROM users WHERE fullname='$fullname' OR email='$email' OR userid='$userid' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['fullname'] === $fullname) {
      array_push($errors, "Fullname already exists!");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists!");
    }

    if ($user['userid'] === $userid) {
        array_push($errors, "User ID already exists!");
      }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "INSERT INTO users (fullname, email, userid, password, gender) 
  			  VALUES('$fullname', '$email', '$userid', '$password', '$gender')";
  	mysqli_query($db, $query);
  	$_SESSION['user id'] = $userid;
  	$_SESSION['success'] = "You are now logged in";
    echo "<script>alert('Sign Up Successful');</script>";
  	header('location: register.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE userid= '$userid' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['$userid '] = $userid ;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: register.php');
  	}else {
  		array_push($errors, "Wrong user ID/password combination");
  	}
  }
}

?>