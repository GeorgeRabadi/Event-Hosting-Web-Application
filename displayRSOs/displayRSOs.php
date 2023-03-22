<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Display RSOs</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">
  <div id="Navbar" class="navbar">
          <a href="../registration/register.php">Home</a>
          <a href="../registration/login.php">Login</a>
          <a href="../registration/register.php">Register</a>
  </div>
  <form action = "displayRSOs.php" method = "post" onsubmit="return CheckBoxCount();">
    <table class="content-table">
        <thead>
          <tr>
            <th>RSO Name</th>
            <th>Admin</th>
            <th>Members</th>
            <th>University</th>
            <th>Select</th>
          </tr>
        </thead>
        <tbody class="tbody">
        <tr style ="background-color: transparent;">
            <td>  
              <div class="button">
                <input type="submit" value="Join" name="join_rso"> 
              </div>
             </td>
        </tr>
        </tbody>
      </table>
  </form>

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
          var cell5 = row.insertCell(4);

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

        var checkbox = document.createElement("INPUT");
        checkbox.setAttribute("type", "checkbox");
        checkbox.setAttribute('value', universityArray[i]);
        checkbox.setAttribute('name', String(i));
        checkbox.setAttribute('class', 'rsoCheck');

        cell5.insertAdjacentElement("afterbegin", checkbox);


      }
  

    }


          
      
    function CheckBoxCount() {

      var rsoList = document.getElementsByClassName("rsoCheck");
      var userUniversity = <?php echo json_encode($userUniversity); ?>;
      var i;

   

      for (i = 0; i < rsoList.length; i++) {
          if (rsoList[i].type == "checkbox" && rsoList[i].checked) 
            break;

      }


      if (i == rsoList.length){
          alert("Please Choose at Least 1 RSO to Join!"); 
          return false;}


      for (i = 0; i < rsoList.length; i++) 
      { 
    
        if (rsoList[i].type == "checkbox" && rsoList[i].checked) 
        {
            
            if(rsoList[i].value != userUniversity)
            {
                alert("You Can Only Join RSOs Belonging to Your University!"); 
                return false;
            }
              
        }

      }

      return true;

    }

  </script>

</body>
</html>

