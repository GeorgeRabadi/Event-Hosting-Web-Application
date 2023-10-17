<!DOCTYPE html>
<html>
<head>
    <title>Display RSOs</title>
</head>
<body onload="generateTable()">

<?php  include('../nav.php');  include('server.php');?>


<form action = "displayRSOs.php" method = "post" onsubmit="return CheckBoxCount();">
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
            <input class="btn btn-success text-dark" type="submit" value="Join" name="join_rso">
            </td>
            <td>
            <input class="btn btn-danger text-dark" type="submit" value="Leave" name="leave_rso">
            </td>
        </tr>
      </table>
    </div>
  </div>
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
          alert("Please Choose at Least 1 RSO to Join or Leave!"); 
          return false;}


      for (i = 0; i < rsoList.length; i++) 
      { 
    
        if (rsoList[i].type == "checkbox" && rsoList[i].checked) 
        {
            
            if(rsoList[i].value != userUniversity)
            {
                alert("Please Choose Only RSOs that Belong to Your University!"); 
                return false;
            }
              
        }

      }

      return true;

    }

  </script>

</body>
</html>

