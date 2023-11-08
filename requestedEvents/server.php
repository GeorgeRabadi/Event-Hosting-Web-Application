<?php

include("../superAdminCheck.php");


$query =  "SELECT universityName FROM users WHERE userID = '$userID'";
$result = mysqli_query($db, $query);
$userUniversity = mysqli_fetch_array($result)[0];



  $username = $_SESSION['userID'];
  
  $query =  "SELECT universityName FROM users WHERE userID = '$userID'";
  $result = mysqli_query($db, $query);
  $userUniversity = mysqli_fetch_array($result)[0];
  
  
  $query =  "SELECT count(*) FROM requestedevents";
  $result = mysqli_query($db, $query);
  $count = mysqli_fetch_array($result);
  
  $total = $count[0];

  $query1 = "SELECT Host FROM requestedevents ORDER BY type";
  $query2 = "SELECT rsoName FROM requestedevents ORDER BY type";
  $query3 = "SELECT name FROM requestedevents  ORDER BY type";
  $query4 = "SELECT category FROM requestedevents ORDER BY type";
  $query5 = "SELECT description FROM requestedevents  ORDER BY type";
  $query6 = "SELECT time FROM requestedevents ORDER BY type";
  $query7 = "SELECT date FROM requestedevents ORDER BY type";
  $query8 = "SELECT locationName FROM requestedevents  ORDER BY type";
  $query9 = "SELECT type FROM requestedevents  ORDER BY type";
  $query10 = "SELECT email FROM requestedevents ORDER BY type";
  $query11 = "SELECT phoneNum FROM requestedevents  ORDER BY type";
  
  $result1 = mysqli_query($db, $query1);
  $result2 = mysqli_query($db, $query2);
  $result3 = mysqli_query($db, $query3);
  $result4 = mysqli_query($db, $query4);
  $result5 = mysqli_query($db, $query5);
  $result6 = mysqli_query($db, $query6);
  $result7 = mysqli_query($db, $query7);
  $result8 = mysqli_query($db, $query8);
  $result9 = mysqli_query($db, $query9);
  $result10 = mysqli_query($db, $query10);
  $result11 = mysqli_query($db, $query11);
  
  
  $hostArray = array();
  $rsoNameArray = array();
  $nameArray = array();
  $categoryArray = array();
  $descriptionArray = array();
  $timeArray = array();
  $dateArray = array();
  $locationNameArray = array();
  $typeArray = array();
  $emailArray = array();
  $phoneNumArray = array();
  $hostUniversity = array();

  
  for($i = 0; $i< $total; $i++){
  
    array_push($hostArray, mysqli_fetch_array($result1)[0]);
    array_push($rsoNameArray, mysqli_fetch_array($result2)[0]);
    array_push($nameArray, mysqli_fetch_array($result3)[0]);
    array_push($categoryArray, mysqli_fetch_array($result4)[0]);
    array_push($descriptionArray, mysqli_fetch_array($result5)[0]);
    array_push($timeArray, mysqli_fetch_array($result6)[0]);
    array_push($dateArray, mysqli_fetch_array($result7)[0]);
    array_push($locationNameArray, mysqli_fetch_array($result8)[0]);
    array_push($typeArray, mysqli_fetch_array($result9)[0]);
    array_push($emailArray, mysqli_fetch_array($result10)[0]);
    array_push($phoneNumArray, mysqli_fetch_array($result11)[0]);
  
    $query =  "SELECT universityName FROM users WHERE userID = '$hostArray[$i]' ";
    $result = mysqli_query($db, $query);
    array_push($hostUniversity, mysqli_fetch_array($result)[0]);

  
  }
    
             
             

if (isset($_POST['accept_event'])) {

  for($i = 0; $i<$total; $i++)
  {
    

    if(isset($_POST[strval($i)]))
    {
      
      $query = "SET foreign_key_checks = 0";
      mysqli_query($db, $query);

      $query = "INSERT INTO events (Host, rsoName, name, category, description, time, date, locationName, email, phoneNum, type)  
      VALUES('$hostArray[$i]', '$rsoNameArray[$i]', '$nameArray[$i]', '$categoryArray[$i]', '$descriptionArray[$i]', '$timeArray[$i]', '$dateArray[$i]', '$locationNameArray[$i]', '$emailArray[$i]', '$phoneNumArray[$i]', '$typeArray[$i]')";
      mysqli_query($db, $query);

      $query = "SET foreign_key_checks = 1";
      mysqli_query($db, $query);


      $query = "DELETE FROM requestedevents WHERE name = '$nameArray[$i]'";
      mysqli_query($db, $query);
    
    }



  }

  echo "<script>alert('Requests Accepted!');</script>";
  header("Refresh:0");

  
}
else if(isset($_POST['decline_event']))
{
  
  for($i = 0; $i<$total; $i++)
  {  
    
    if(isset($_POST[strval($i)]))
    {
        
        $query = "DELETE FROM requestedevents WHERE name = '$nameArray[$i]'";
        mysqli_query($db, $query);
      
    }

  }  

  echo "<script>alert('Requests Declined!');</script>";
  header("Refresh:0");

}


?>