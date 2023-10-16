<!DOCTYPE html>
<html>
<head>
    <title>Display Events</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="generateTable()">

<?php  include('../nav.php');  include('server.php');?>

<div class="d-flex align-items-center min-vh-100 " style="margin-bottom:50px;">
  <div class="container-fluid" style="width: 50%;">
    <table class="table table-bordered table-dark table-secondary table-hover">
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
            <th>Tweet!</th>
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

          var eventName = nameArray[i];
          cell12.insertAdjacentHTML('beforeend', '<a class="twitter-share-button"href="https://twitter.com/intent/tweet?text=Check%20This%20Event%20Out!%20localhost/cop4710/commentEvent/commentEvent.php?eventName=' + eventName  + '">Tweet</a>');

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

        
        cell1.setAttribute("id","event-link");
        cell1.setAttribute("name", nameArray[i]);

        cell1.onclick = function()
        {

          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell2.setAttribute("id","event-link");
        cell2.setAttribute("name", nameArray[i]);

        cell2.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell3.setAttribute("id","event-link");
        cell3.setAttribute("name", nameArray[i]);

        cell3.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }


        cell4.setAttribute("id","event-link");
        cell4.setAttribute("name", nameArray[i]);

        cell4.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell5.setAttribute("id","event-link");
        cell5.setAttribute("name", nameArray[i]);

        cell5.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        
        cell6.setAttribute("id","event-link");
        cell6.setAttribute("name", nameArray[i]);

        cell6.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell7.setAttribute("id","event-link");
        cell7.setAttribute("name", nameArray[i]);

        cell7.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell8.setAttribute("id","event-link");
        cell8.setAttribute("name", nameArray[i]);

        cell8.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell9.setAttribute("id","event-link");
        cell9.setAttribute("name", nameArray[i]);

        cell9.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell10.setAttribute("id","event-link");
        cell10.setAttribute("name", nameArray[i]);

        cell10.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        cell11.setAttribute("id","event-link");
        cell11.setAttribute("name", nameArray[i]);

        cell11.onclick = function()
        {
          
          eventName = this.getAttribute("name");
          sendToPHP(eventName);

        }

        k++;

        

      }
      
      
      

    }

    function sendToPHP(eventName)
    {
      var javascriptVariable = eventName;
      window.location.href = "../commentEvent/commentEvent.php?eventName=" + javascriptVariable;

    }


    window.twttr = (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0],
        t = window.twttr || {};
      if (d.getElementById(id)) return t;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);

      t._e = [];
      t.ready = function(f) {
        t._e.push(f);
      };

      return t;
    }(document, "script", "twitter-wjs"));

  </script>

</body>
</html>

