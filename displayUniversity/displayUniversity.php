<?php 
       
session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());

         
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

<!DOCTYPE html>
<html>
<head>
    <title>Display Universities</title>
    <link rel="stylesheet" href="../style.css">
</head>
<div id="Navbar" class="navbar">
        <a class="active" href="../homepage/homepage.php">Home</a>
        <a href="../createEvent/createEvent.php">Create Event</a>
        <a href="../createRSO/createRSO.php">Create RSO</a>
        <a href="../displayEvents/displayEvents.php">See Events</a>
        <a href="../displayRSOs/displayRSOs.php">See RSO</a>
        <a href="../displayUniversity/displayUniversity.php">See University</a>
</div>
<body onload="generateTable()">
    <table class="content-table">
        <thead>
          <tr>
            <th>University Name</th>
            <th>Location</th>
            <th>Description</th>
            <th>Number of Students</th>
          </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
      </table>

    <div id="Bar" class="bar">
    </div>

  <script>
    
    function generateTable(){
 
      var universityArray = <?php echo json_encode($universityArray); ?>;
      var locationArray = <?php echo json_encode($locationArray); ?>;
      var descriptionArray = <?php echo json_encode($descriptionArray); ?>;
      var numArray = <?php echo json_encode($numArray); ?>;
      var length = universityArray.length;
      var table = document.getElementsByClassName("tbody");



      for(var i = 0; i<length; i++)
      {
          var row = table[0].insertRow(i);

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);

          cell1.innerHTML = universityArray[i];
          cell2.innerHTML = locationArray[i];
          cell3.innerHTML = descriptionArray[i];
          cell4.innerHTML = numArray[i];

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

