<?php


$checkUniversity = "SELECT universityName FROM users WHERE userID = '$userID'  LIMIT 1";
$result = mysqli_query($db, $checkUniversity);
$universityName = mysqli_fetch_array($result)[0];

$query =  "SELECT count(*) FROM users WHERE universityName ='$universityName'";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query = "SELECT userID FROM users WHERE universityName ='$universityName'";
$result = mysqli_query($db, $query);
$studentArray = array();

for($i = 0; $i< $total; $i++)
  array_push($studentArray, mysqli_fetch_array($result)[0]);



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