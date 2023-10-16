<!DOCTYPE html>
<html>
<head>
    <title>Requested RSOs</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body onload="generateTable()">

<?php  include('../nav.php');  include('server.php');?>

  <form action = "requestedRSOs.php" method = "post" onsubmit="return CheckBoxCount();">
    <div class="d-flex align-items-center min-vh-100 " style="margin-bottom:50px;">
      <div class="container-fluid" style="width: 50%;">
        <table class="table table-bordered table-dark table-secondary table-hover">
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
                    <input class="btn btn-success text-dark" type="submit" value="Accept" name="accept_rso"> 
                </td>
                <td>  
                    <input class="btn btn-danger text-dark" type="submit" value="Decline" name="decline_rso"> 
                </td>
            </tr>
            </tbody>
        </table>
      </div>
  </div>
</form>
    <div id="Bar" class="bar">
    </div>
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
        checkbox.setAttribute('value', rsoArray[i]);
        checkbox.setAttribute('name', String(i));
        checkbox.setAttribute('class', 'rsoCheck');

        cell5.insertAdjacentElement("afterbegin", checkbox);

      }

      

    }

    
    function CheckBoxCount() {

      var rsoList = document.getElementsByClassName("rsoCheck");
      var i;

      for (i = 0; i < rsoList.length; i++) {
          if (rsoList[i].type == "checkbox" && rsoList[i].checked) 
            break;

      }

      if (i == rsoList.length){
          alert("Please Choose at Least 1 RSO!"); 
          return false;}


      return true;

    }

  </script>

</body>
</html>

