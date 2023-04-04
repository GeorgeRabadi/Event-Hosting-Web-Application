<?php include('server.php'); 
       
$user = $_SESSION['userID'];
$checkUniversity = "SELECT universityName FROM users WHERE userID = '$user'  LIMIT 1";
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
         
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create RSO</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body onload="generateTable()">
  <div class="navbar">
          <a class="active" href="../homepage/homepage.php">Home</a>
          <a href="../createEvent/createEvent.php">Create Event</a>
          <a href="../createRSO/createRSO.php">Create RSO</a>
          <a href="../displayEvents/displayEvents.php">See Events</a>
          <a href="../displayRSOs/displayRSOs.php">See RSOs</a>
          <a href="../displayUniversity/displayUniversity.php">See University</a>
          <a href="../requestedRSOs/requestedRSOs.php">Pending RSOs</a>
          <a href="../requestedEvents/requestedEvents.php">Pending Events</a>
  </div>

  <form action = "createRSO.php" method = "post" onsubmit="return CheckBoxCount();">
    <?php include('errors.php'); ?> 
    <table class="content-table">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Select as Standard Member</th>
            <th>Select as Admin</th>
          </tr>
        </thead>
        <tbody class="tbody">
        <tr>
          <td>  
              <div class="input-box">
                  <input type="text" name="name" placeholder="Enter RSO Name" required value = "<?php echo $name; ?>">
              </div>
             </td>
          </tr>
          <tr style ="background-color: transparent;">
            <td>  
              <div class="button">
                <input type="submit" value="Submit" name="create_rso"> 
              </div>
             </td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" id = "arsize" name="arsize" value = "<?php echo $arsize; ?>">
  <form>
  
  <div id="Bar" class="bar">
  </div>

  <script>
    
    function generateTable(){
 
      var studentArray = <?php echo json_encode($studentArray); ?>;
      var table = document.getElementsByClassName("tbody");


      for(var i = 0; i<studentArray.length; i++)
      {
          var row = table[0].insertRow(i);

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);

          cell1.innerHTML = studentArray[i];

          if(i%2==0)
          cell1.style.color = '#F1C400';

          var checkbox = document.createElement("INPUT");
          checkbox.setAttribute("type", "checkbox");
          checkbox.setAttribute('value', studentArray[i]);
          checkbox.setAttribute('name', String(i));
          checkbox.setAttribute('class', 'studentCheck');
          

          cell2.insertAdjacentElement("afterbegin", checkbox);
          
          var checkbox = document.createElement("INPUT");
          checkbox.setAttribute("type", "checkbox");
          checkbox.setAttribute('value', studentArray[i]);
          checkbox.setAttribute('name', 'admin');
          checkbox.setAttribute('class', 'adminCheck');
 

          cell3.insertAdjacentElement("afterbegin", checkbox);

      }
      
      
      

    }

    function CheckBoxCount() {

        var studentList = document.getElementsByClassName("studentCheck");
        adminList = document.getElementsByClassName("adminCheck");
        var studentChecked = 0;
        var adminChecked = 0;
        var j;

          
        for (i = 0; i < adminList.length; i++) {
            if (adminList[i].type == "checkbox" && adminList[i].checked) {
              adminChecked++;
              j = i;
            }
        }

              
        if (adminChecked != 1){
            alert("Please Choose Exactly 1 Admin!"); 
            return false;}

        for (var i = 0; i < studentList.length; i++) {
            if (studentList[i].type == "checkbox" && studentList[i].checked) {

              if(studentList[i].value == adminList[j].value){
              alert("Admin Can't be a Standard Member!"); 
              return false;}

              studentChecked++;
            }
        }

        if (adminChecked + studentChecked < 4){
            alert("Please Choose at Least 4 RSO Members!"); 
            return false;}

        
        document.getElementById("arsize").value  = studentList.length;

        return true;

    }

  </script>
</body>
</html>

