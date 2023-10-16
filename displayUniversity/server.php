<?php 
       
         
$query =  "SELECT count(*) FROM university";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query1 = "SELECT universityName FROM university ORDER BY universityName";
$query2 = "SELECT locationName FROM university ORDER BY universityName";
$query3 = "SELECT description FROM university ORDER BY universityName";
$query4 = "SELECT numStudents FROM university ORDER BY universityName";
$result1 = mysqli_query($db, $query1);
$result2 = mysqli_query($db, $query2);
$result3 = mysqli_query($db, $query3);
$result4 = mysqli_query($db, $query4);
$universityArray = array();
$locationArray = array();
$descriptionArray = array();
$numArray = array();

for($i = 0; $i< $total; $i++){
  array_push($universityArray, mysqli_fetch_array($result1)[0]);
  array_push($locationArray, mysqli_fetch_array($result2)[0]);
  array_push($descriptionArray, mysqli_fetch_array($result3)[0]);
  array_push($numArray, mysqli_fetch_array($result4)[0]);
}

         
?>