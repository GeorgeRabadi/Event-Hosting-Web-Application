<?php

         

$query =  "SELECT universityName FROM users WHERE userID = '$userID'";
$result = mysqli_query($db, $query);
$userUniversity = mysqli_fetch_array($result)[0];

  
$query =  "SELECT count(*) FROM rso";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query1 = "SELECT rsoName FROM rso ORDER BY rsoName";
$query2 = "SELECT adminID FROM rso ORDER BY rsoName";
$result1 = mysqli_query($db, $query1);
$result2 = mysqli_query($db, $query2);
$rsoArray = array();
$adminArray = array();
$universityArray = array();
$memberArray = array();

for($i = 0; $i< $total; $i++){
  array_push($rsoArray, mysqli_fetch_array($result1)[0]);
  array_push($adminArray, mysqli_fetch_array($result2)[0]);
}



for($i = 0; $i< $total; $i++){

  $query = "SELECT universityName FROM users WHERE userID = '$adminArray[$i]' ORDER BY 
  (SELECT rsoName from rso WHERE adminID = '$adminArray[$i]')";
  $result = mysqli_query($db, $query);

  array_push($universityArray, mysqli_fetch_array($result)[0]);

}



for($i = 0; $i< $total; $i++)
{
  
  $query =  "SELECT count(*) FROM rsomembership where rsoName = '$rsoArray[$i]'";
  $result = mysqli_query($db, $query);
  $count = mysqli_fetch_array($result);

  $count[0];

  $query =  "SELECT userID FROM rsomembership WHERE rsoName = '$rsoArray[$i]' AND userID != '$adminArray[$i]' ORDER BY rsoName";
  $result = mysqli_query($db, $query);
  $members = "";

  for($j = 0; $j<$count[0]-2; $j++)
  {
    $members = $members.mysqli_fetch_array($result)[0]; 
    $members = $members." - ";
  }

  $members = $members.mysqli_fetch_array($result)[0];
  array_push($memberArray, $members);

}

if (isset($_POST['join_rso'])) 
{

  for($i = 0; $i<$total; $i++)
  {
   

    if(isset($_POST[strval($i)]))
    {

      $query =  "SELECT count(*) FROM rsomembership where rsoName = '$rsoArray[$i]' AND userID = '$userID'";
      $result = mysqli_query($db, $query);
      $count = mysqli_fetch_array($result)[0];
      
      if($count != 0)
      {
        echo "<script>alert('You are Already Part of $rsoArray[$i]! No Changes were Made to Your Membership!');</script>";
        continue;
      }

      $query =  "SELECT count(*) FROM rsojoinrequests where rsoName = '$rsoArray[$i]' AND userID = '$userID'";
      $result = mysqli_query($db, $query);
      $count = mysqli_fetch_array($result)[0];

      if($count != 0)
      {
        echo "<script>alert('You Have Already Sent a Join Request to $rsoArray[$i]! No Changes were Made to This Request!');</script>";
        continue;
      }


      $query = "INSERT INTO rsojoinrequests (rsoName, userID)  VALUES('$rsoArray[$i]','$userID')";
      mysqli_query($db, $query);

      echo "<script>alert('Request to $rsoArray[$i] Sent!');</script>";

    
    }

  }

  

}
else if (isset($_POST['leave_rso'])) 
{

  for($i = 0; $i<$total; $i++)
  {
   

    if(isset($_POST[strval($i)]))
    {

      $query =  "SELECT count(*) FROM rso where rsoName = '$rsoArray[$i]' AND adminID = '$userID'";
      $result = mysqli_query($db, $query);
      $count = mysqli_fetch_array($result)[0];

      if($count != 0)
      {
        echo "<script>alert('Admin cannot leave RSO!'";
        continue;
      }

      $query =  "SELECT count(*) FROM rsomembership where rsoName = '$rsoArray[$i]' AND userID = '$userID'";
      $result = mysqli_query($db, $query);
      $count = mysqli_fetch_array($result)[0];

      if($count == 0)
      {
        echo "<script>alert('You are not a member of $rsoArray[$i]!');</script>";
        continue;
      }


      $query = "DELETE FROM rsomembership where rsoName = '$rsoArray[$i]' AND userID = '$userID'";
      mysqli_query($db, $query);

      echo "<script>alert('You have left $rsoArray[$i]!');</script>";

    
    }

  }

  header("Refresh:0");

  

}
?>