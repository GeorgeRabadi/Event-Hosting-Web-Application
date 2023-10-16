
<!DOCTYPE html>
<html>
<head>
    <title>Display Universities</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body onload="generateTable()">

<?php  include('../nav.php');  include('server.php');?>


  <div class="d-flex align-items-center min-vh-100 " style="margin-bottom:50px;">
    <div class="container-fluid" style="width: 50%;">
        <table class="table table-bordered table-dark table-secondary table-hover">
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
    </div>
</div>


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

