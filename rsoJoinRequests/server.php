<?php
session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}

$userID = $_SESSION['userID'];

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());


$checkAdminStatus = "SELECT userStatus FROM users WHERE userID = '$userID'  LIMIT 1";
$result = mysqli_query($db, $checkAdminStatus);
$adminStatus = mysqli_fetch_array($result);

if($adminStatus[0] != 'A' && $adminStatus[0] != 'S'){
  header("Location: ../index.php");
  die;}
       

  
$query =  "SELECT count(*) FROM rsojoinrequests WHERE
rsoName IN (SELECT rsoName from rso WHERE adminID = '$userID')";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query1 = "SELECT rsoName FROM rsojoinrequests WHERE
rsoName IN (SELECT rsoName from rso WHERE adminID = '$userID') ORDER BY rsoName";
$result1 = mysqli_query($db, $query1);
$query2 = "SELECT userID FROM rsojoinrequests WHERE
rsoName IN (SELECT rsoName from rso WHERE adminID = '$userID') ORDER BY rsoName";
$result2 = mysqli_query($db, $query2);
$rsoArray = array();
$userArray = array();

for($i = 0; $i< $total; $i++){
  array_push($rsoArray, mysqli_fetch_array($result1)[0]);
  array_push($userArray, mysqli_fetch_array($result2)[0]);
}



if (isset($_POST['accept_request'])) 
{

  for($i = 0; $i<$total; $i++)
  {
   

    if(isset($_POST[strval($i)]))
    {


      $query = "INSERT INTO rsomembership (rsoName, userID)  VALUES('$rsoArray[$i]','$userArray[$i]')";
      mysqli_query($db, $query);

      $query = "DELETE FROM rsojoinrequests WHERE rsoName = '$rsoArray[$i]' AND userID = '$userArray[$i]'";
      mysqli_query($db, $query);

      echo "<script>alert('$userArray[$i] Accepted Into $rsoArray[$i]!');</script>";

    
    }

  }

  header("Refresh:0");

  

}
else if (isset($_POST['decline_request']))
{
  for($i = 0; $i<$total; $i++)
  {
   

    if(isset($_POST[strval($i)]))
    {

      $query = "DELETE FROM rsojoinrequests WHERE rsoName = '$rsoArray[$i]' AND userID = '$userArray[$i]'";
      mysqli_query($db, $query);

      echo "<script>alert('$userArray[$i] Declined From $rsoArray[$i]!');</script>";
      
    
    }

  }

}
?>