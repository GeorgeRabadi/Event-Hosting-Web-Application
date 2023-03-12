<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>RSO Join Requests</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">
  <form action = "RSOJOINREQUESTS.php" method = "post" onsubmit="return CheckBoxCount();">
    <table class="content-table">
        <thead>
          <tr>
            <th>RSO Name</th>
            <th>Requesting User</th>
            <th>Select</th>
          </tr>
        </thead>
        <tbody class="tbody">
        <tr style ="background-color: transparent;">
            <td>  
              <div class="button">
                <input type="submit" value="Accept" name="accept_request"> 
              </div>
            </td>
            <td>  
              <div class="button">
                <input type="submit" value="Decline" name="decline_request"> 
              </div>
            </td>
        </tr>
        </tbody>
      </table>
  </form>

  <script>
    
    function generateTable(){
 
      var rsoArray = <?php echo json_encode($rsoArray); ?>;
      var userArray = <?php echo json_encode($userArray); ?>;
      var length = rsoArray.length;
      var table = document.getElementsByClassName("tbody");



      for(var i = 0; i<length; i++)
      {
          var row = table[0].insertRow(i);

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
  

          cell1.innerHTML = rsoArray[i];
          cell2.innerHTML = userArray[i];

          if(i%2==0){
          cell1.style.color = '#F1C400';
          cell2.style.color = '#F1C400';
   
        }

        var checkbox = document.createElement("INPUT");
        checkbox.setAttribute("type", "checkbox");
        checkbox.setAttribute('value', rsoArray[i]);
        checkbox.setAttribute('name', String(i));
        checkbox.setAttribute('class', 'joinCheck');

        cell3.insertAdjacentElement("afterbegin", checkbox);


      }

    }


          
      
    function CheckBoxCount() {

      var joinList = document.getElementsByClassName("joinCheck");
      var i;

   

      for (i = 0; i < joinList.length; i++) {
          if (joinList[i].type == "checkbox" && joinList[i].checked) 
            break;

      }


      if (i == joinList.length){
          alert("Please Choose at Least 1 User!"); 
          return false;}


      return true;

    }

  </script>

</body>
</html>

