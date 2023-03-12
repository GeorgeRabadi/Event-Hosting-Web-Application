<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Requested Events</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">
  <form action = "requestedEvents.php" method = "post" onsubmit="return CheckBoxCount();">
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
            <th>Select</th>
          </tr>
        </thead>
        <tbody class="tbody">
        <tr style ="background-color: transparent;">
            <td>  
              <div class="button">
                <input type="submit" value="Accept" name="accept_event"> 
              </div>
             </td>
             <td>  
              <div class="button">
                <input type="submit" value="Decline" name="decline_event"> 
              </div>
            </td>
        </tr>
        </tbody>
      </table>
  </form>
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
      var hostUniversity = <?php echo json_encode($hostUniversity); ?>;

      var length = hostArray.length;
      var table = document.getElementsByClassName("tbody");




      for(var i = 0, k = 0; i<length; i++)
      {
          
          if(hostUniversity[i] != userUniversity)
            continue;

        
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
          var cell12 = row.insertCell(11);
  

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
          cell11.style.color = '#F1C400';}


          var checkbox = document.createElement("INPUT");
          checkbox.setAttribute("type", "checkbox");
          checkbox.setAttribute('value', nameArray[i]);
          checkbox.setAttribute('name', String(i));
          checkbox.setAttribute('class', 'eventCheck');

          cell12.insertAdjacentElement("afterbegin", checkbox);

        k++;




      }
      
      
      

    }

    function CheckBoxCount() {

      var eventList = document.getElementsByClassName("eventCheck");
      var i;

      for (i = 0; i < eventList.length; i++) {
          if (eventList[i].type == "checkbox" && eventList[i].checked) 
            break;

      }

      if (i == eventList.length){
          alert("Please Choose at Least 1 Event!"); 
          return false;}


      return true;

    }

  </script>

</body>
</html>

