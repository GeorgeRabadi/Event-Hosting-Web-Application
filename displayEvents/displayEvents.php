<?php 
       
session_start();

if (!isset($_SESSION['userID'])){
  header("Location: ../registration/login.php");
  die;}

$db = mysqli_connect("localhost", 'root', '', 'cop4710');

if (mysqli_connect_errno()) 
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());

         

$username = $_SESSION['userID'];

$query =  "SELECT universityName FROM users WHERE userID = '$username'";
$result = mysqli_query($db, $query);
$userUniversity = mysqli_fetch_array($result)[0];


$query =  "SELECT count(*) FROM rsoMembership where userID = '$username'";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];
$userRSO = array();
$query =  "SELECT rsoName FROM rsoMembership WHERE userID = '$username'";
$result = mysqli_query($db, $query);

for($i = 0; $i< $total; $i++)
  array_push($userRSO, mysqli_fetch_array($result)[0]);


$query =  "SELECT count(*) FROM events";
$result = mysqli_query($db, $query);
$count = mysqli_fetch_array($result);

$total = $count[0];

$query1 = "SELECT Host FROM events ORDER BY type";
$query2 = "SELECT rsoName FROM events ORDER BY type";
$query3 = "SELECT name FROM events ORDER BY type";
$query4 = "SELECT category FROM events ORDER BY type";
$query5 = "SELECT description FROM events ORDER BY type";
$query6 = "SELECT time FROM events ORDER BY type";
$query7 = "SELECT date FROM events ORDER BY type";
$query8 = "SELECT locationName FROM events ORDER BY type";
$query9 = "SELECT type FROM events ORDER BY type";
$query10 = "SELECT email FROM events ORDER BY type";
$query11 = "SELECT phoneNum FROM events ORDER BY type";

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

         
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Events</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">
    <table class="content-table">
        <thead>
          <tr>
            <th>Host</th>
            <th>Affiliated RSO</th>
            <th>Event Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Time</th>
            <th>Date</th>
            <th>Location</th>
            <th>Type</th>
            <th>Contact Email</th>
            <th>Contact Phone Number</th>
          </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
      </table>

  <script>
    
    function generateTable(){
 
      var hostArray = <?php echo json_encode($hostArray); ?>;
      var rsoNameArray = <?php echo json_encode($rsoNameArray); ?>;
      var nameArray = <?php echo json_encode($nameArray); ?>;
      var categoryArray = <?php echo json_encode($categoryArray); ?>;
      var descriptionArray = <?php echo json_encode($descriptionArray); ?>;
      var timeArray = <?php echo json_encode($timeArray); ?>;
      var dateArray = <?php echo json_encode($dateArray); ?>;
      var locationNameArray = <?php echo json_encode($locationNameArray); ?>;
      var typeArray = <?php echo json_encode($typeArray); ?>;
      var emailArray = <?php echo json_encode($emailArray); ?>;
      var phoneNumArray = <?php echo json_encode($phoneNumArray); ?>;

      var userUniversity = <?php echo json_encode($userUniversity); ?>;
      var userRSO = <?php echo json_encode($userRSO); ?>;
      var hostUniversity = <?php echo json_encode($hostUniversity); ?>;

      var length = hostArray.length;
      var rsoLength = userRSO.length;
      var table = document.getElementsByClassName("tbody");




      for(var i = 0, k = 0; i<length; i++)
      {
          
          if(typeArray[i] == "Private" && hostUniversity[i] != userUniversity)
            continue;
      
            

          if(typeArray[i] == "RSO")
          {
            var j;
            for(j = 0; j<rsoLength; j++)
            {
                if(userRSO[j] == rsoNameArray[i])
                  break;
            }

            if(j == rsoLength)
              continue;

          }

          var row = table[0].insertRow(k);
          

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          var cell7 = row.insertCell(6);
          var cell8 = row.insertCell(7);
          var cell9 = row.insertCell(8);
          var cell10 = row.insertCell(9);
          var cell11 = row.insertCell(10);
  

          cell1.innerHTML = hostArray[i];
          cell2.innerHTML = rsoNameArray[i];
          cell3.innerHTML = nameArray[i];
          cell4.innerHTML = categoryArray[i];
          cell5.innerHTML = descriptionArray[i];
          cell6.innerHTML = timeArray[i];
          cell7.innerHTML = dateArray[i];
          cell8.innerHTML = locationNameArray[i];
          cell9.innerHTML = typeArray[i];
          cell10.innerHTML = emailArray[i];
          cell11.innerHTML = phoneNumArray[i];

          if(k%2==0){

          cell1.style.color = '#F1C400';
          cell2.style.color = '#F1C400';
          cell3.style.color = '#F1C400';
          cell4.style.color = '#F1C400';
          cell5.style.color = '#F1C400';
          cell6.style.color = '#F1C400';
          cell7.style.color = '#F1C400';
          cell8.style.color = '#F1C400';
          cell9.style.color = '#F1C400';
          cell10.style.color = '#F1C400';
          cell11.style.color = '#F1C400';

        }

        k++;

      }
      
      
      

    }

  </script>

</body>
</html>

