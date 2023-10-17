<?php


$checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$userID'  LIMIT 1";
$result = mysqli_query($db, $checkAdminStatus);
$adminStatus = mysqli_fetch_array($result);

if($adminStatus[0] != 'A' && $adminStatus[0] != 'S'){
  header("Location: ../401.php");
  die;
}

           
$query =  "SELECT count(*) FROM requestedrso";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query1 = "SELECT rsoName FROM requestedrso ORDER BY rsoName";
$query2 = "SELECT adminID FROM requestedrso ORDER BY rsoName";
$result1 = mysqli_query($db, $query1);
$result2 = mysqli_query($db, $query2);
$rsoArray = array();
$adminArray = array();
$universityArray = array();
$memberArray = array();
$members = array();

for($i = 0; $i< $total; $i++){
  array_push($rsoArray, mysqli_fetch_array($result1)[0]);
  array_push($adminArray, mysqli_fetch_array($result2)[0]);
}



for($i = 0; $i< $total; $i++){

  $query = "SELECT universityName FROM users WHERE userID = '$adminArray[$i]' ORDER BY 
  (SELECT rsoName from requestedrso WHERE adminID = '$adminArray[$i]')";
  $result = mysqli_query($db, $query);

  array_push($universityArray, mysqli_fetch_array($result)[0]);

}



for($i = 0; $i< $total; $i++)
{
  
  $query =  "SELECT count(*) FROM requestedrsomembership WHERE rsoName = '$rsoArray[$i]'";
  $result = mysqli_query($db, $query);
  $count = mysqli_fetch_array($result);

  $count[0];

  $query =  "SELECT userID FROM requestedrsomembership WHERE rsoName = '$rsoArray[$i]' AND userID != '$adminArray[$i]' ORDER BY rsoName";
  $result = mysqli_query($db, $query);
  $memberArray[$i] = "";
  $members[$i] = array();

  for($j = 0; $j<$count[0]-2; $j++)
  {
    $members[$i][$j] = mysqli_fetch_array($result)[0]; 
    $memberArray[$i] =  $memberArray[$i].$members[$i][$j]." - ";

  }

  $members[$i][$j] = mysqli_fetch_array($result)[0];
  $memberArray[$i] =  $memberArray[$i].$members[$i][$j];
  $members[$i][$j+1] = $adminArray[$i];

}
            

if (isset($_POST['accept_rso'])) {

  for($i = 0; $i<$total; $i++)
  {
    

    if(isset($_POST[strval($i)]))
    {
      
      $query = "UPDATE users SET UserStatus = 'A' WHERE userID = '$adminArray[$i]' AND UserStatus != 'S'";
      mysqli_query($db, $query);
      
      $query = "INSERT INTO rso (rsoName, adminID) VALUES('$rsoArray[$i]','$adminArray[$i]')";
      mysqli_query($db, $query);

      $length = count($members[$i]);

      for($j = 0; $j<$length; $j++)
      {  
        
        $member = $members[$i][$j];

        $query = "INSERT INTO rsomembership (rsoName, userID)  VALUES('$rsoArray[$i]','$member')";
        mysqli_query($db, $query);

        $query = "DELETE FROM requestedrsomembership WHERE rsoName = '$rsoArray[$i]' AND userID = '$member'";
        mysqli_query($db, $query);

      }

      $query = "DELETE FROM requestedrso WHERE rsoName = '$rsoArray[$i]' AND adminID = '$adminArray[$i]'";
      mysqli_query($db, $query);
    
    }



  }

  echo "<script>alert('Requests Accepted!');</script>";
  header("Refresh:0");

  
}
else if (isset($_POST['decline_rso']))
{
  for($i = 0; $i<$total; $i++)
  { 
    if(isset($_POST[strval($i)]))
    {
      
      $length = count($members[$i]);

      for($j = 0; $j<$length; $j++)
      {  
        
        $member = $members[$i][$j];

        $query = "DELETE FROM requestedrsomembership WHERE rsoName = '$rsoArray[$i]' AND userID = '$member'";
        mysqli_query($db, $query);

      }

      $query = "DELETE FROM requestedrso WHERE rsoName = '$rsoArray[$i]' AND adminID = '$adminArray[$i]'";
      mysqli_query($db, $query);
    
    }

  } 

  echo "<script>alert('Requests Declined!');</script>";
  header("Refresh:0");

}


?>