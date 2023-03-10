<?php 
       
session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());

         
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
         
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display RSOs</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">
    <table class="content-table">
        <thead>
          <tr>
            <th>RSO Name</th>
            <th>Admin</th>
            <th>Members</th>
            <th>University</th>
          </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
      </table>

  <script>
    
    function generateTable(){
 
      var rsoArray = <?php echo json_encode($rsoArray); ?>;
      var adminArray = <?php echo json_encode($adminArray); ?>;
      var universityArray = <?php echo json_encode($universityArray); ?>;
      var memberArray = <?php echo json_encode($memberArray); ?>;
      var length = rsoArray.length;
      var table = document.getElementsByClassName("tbody");



      for(var i = 0; i<length; i++)
      {
          var row = table[0].insertRow(i);

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);

          cell1.innerHTML = rsoArray[i];
          cell2.innerHTML = adminArray[i];
          cell3.innerHTML = memberArray[i];
          cell4.innerHTML = universityArray[i];

          if(i%2==0){
          cell1.style.color = '#F1C400';
          cell2.style.color = '#F1C400';
          cell3.style.color = '#F1C400';
          cell4.style.color = '#F1C400';
        }

      }
      
      
      

    }

  </script>

</body>
</html>

