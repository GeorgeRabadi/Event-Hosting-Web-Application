<?php


$eventName = mysqli_real_escape_string($db, $_GET['eventName']);


$query =  "SELECT count(*) FROM events where name = '$eventName' ";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

if($count[0] == 0)
{
header("Location: ../404.php");
die;
}


if(isset($_GET['oldText']) && isset($_GET['userID']))
  $oldText = mysqli_real_escape_string($db, $_GET['oldText']);




$query =  "SELECT count(*) FROM comments where eventname = '$eventName' ";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);
$total = $count[0];

$userArray = array();
$textArray = array();
$ratingArray = array();

$query1 = "SELECT userID FROM comments WHERE eventname = '$eventName' ORDER BY userID";
$query2 = "SELECT text FROM comments WHERE eventname = '$eventName' ORDER BY userID";
$query3 = "SELECT rating FROM comments  WHERE eventname = '$eventName' ORDER BY userID";

$result1 = mysqli_query($db, $query1);
$result2 = mysqli_query($db, $query2);
$result3 = mysqli_query($db, $query3);
  

for($i = 0; $i< $total; $i++){
  
array_push($userArray , mysqli_fetch_array($result1)[0]);
array_push($textArray, mysqli_fetch_array($result2)[0]);
array_push($ratingArray, mysqli_fetch_array($result3)[0]);
 


}



if (isset($_POST['submit_comment'])) 
{

  $text = mysqli_real_escape_string($db, $_POST['comment']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);

  $query =  "SELECT MAX(id) FROM comments";
  $result = mysqli_query($db, $query);
  $count = mysqli_fetch_array($result)[0] + 1;

  $query = "INSERT INTO comments (id, userID, eventname, text, rating) VALUES('$count' , '$userID','$eventName', '$text', '$rating')";
  mysqli_query($db, $query);

  header("location: commentEvent.php?eventName=$eventName");
  


}
else if (isset($_POST['delete_comment']))
{
    $text = mysqli_real_escape_string($db, $_POST['textValue']);

    $query =  "DELETE FROM comments WHERE userid = '$userID' AND text = '$text'";
    $result = mysqli_query($db, $query);

    header("location: commentEvent.php?eventName=$eventName");
    

}
else if (isset($_POST['edit_comment']))
{
    $text = mysqli_real_escape_string($db, $_POST['textValue']);

    header("location: editComment.php?eventName=$eventName&oldText=$text&userID=$userID");
    

}
else if (isset($_POST['submit_new_comment']))
{
  $text = mysqli_real_escape_string($db, $_POST['comment']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);
  $oldText = mysqli_real_escape_string($db, $_POST['oldText']);



  $query = "UPDATE comments SET text = '$text', rating = '$rating'  WHERE (text = '$oldText' AND userID = '$userID')";
  mysqli_query($db, $query);

  header("location: commentEvent.php?eventName=$eventName");
  
}
?>