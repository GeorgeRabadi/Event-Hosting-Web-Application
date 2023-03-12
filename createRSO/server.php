<?php

session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());



$name = "";
$admin = "";
$arsize = "";
$student = array();
$errors = array(); 


if (isset($_POST['create_rso'])) {

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $admin = mysqli_real_escape_string($db, $_POST['admin']);
  $arsize = mysqli_real_escape_string($db, $_POST['arsize']);
  for($i = 0; $i<$arsize; $i++)
  {
    if(isset($_POST[strval($i)]))
        array_push($student, mysqli_real_escape_string($db, $_POST[strval($i)]));

  }

  $query = "SELECT * FROM rso WHERE rsoName ='$name' LIMIT 1";
  $result = mysqli_query($db, $query);
  $rName = mysqli_fetch_assoc($result);
  

  if (!empty($rName)) {
      array_push($errors, "RSO already exists!");
  }

  $query = "SELECT * FROM requestedrso WHERE rsoName ='$name' LIMIT 1";
  $result = mysqli_query($db, $query);
  $rName = mysqli_fetch_assoc($result);
  
  if (!empty($rName)) {
    array_push($errors, "RSO already requested!");
}
  
  
  $host = $_SESSION['userID'];
  $checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$host'  LIMIT 1";
  $result = mysqli_query($db, $checkAdminStatus);
  $adminStatus = mysqli_fetch_array($result);


  if (count($errors) == 0 ) {

    if($adminStatus[0] == 'A')
    {

      $query = "UPDATE users SET UserStatus = 'A' WHERE userID = '$admin' AND UserStatus != 'S'";
      mysqli_query($db, $query);
      
      $query = "INSERT INTO rso (rsoName, adminID) VALUES('$name','$admin')";
      mysqli_query($db, $query);

      $query = "INSERT INTO rsomembership (rsoName, userID) VALUES('$name','$admin' )";
      mysqli_query($db, $query);

      for($i = 0; $i<sizeof($student); $i++)
      {  

        $query = "INSERT INTO rsomembership (rsoName, userID)  VALUES('$name','$student[$i]')";
        mysqli_query($db, $query);

      }


      echo "<script>alert('RSO Created Successfully');</script>";
    
    }
    else
    {

      $query = "INSERT INTO requestedrso (rsoName, adminID) VALUES('$name','$admin')";
      mysqli_query($db, $query);

      $query = "INSERT INTO requestedrsomembership (rsoName, userID) VALUES('$name','$admin' )";
      mysqli_query($db, $query);

      for($i = 0; $i<sizeof($student); $i++)
      {  

        $query = "INSERT INTO requestedrsomembership (rsoName, userID)  VALUES('$name','$student[$i]')";
        mysqli_query($db, $query);

      }

      echo "<script>alert('Awaiting Admin Approval');</script>";
      
    }
    
  }
  
}


?>