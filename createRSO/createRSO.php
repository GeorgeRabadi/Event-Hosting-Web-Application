<!DOCTYPE html>
<html>
<head>
    <title>Create RSO</title>
</head>

<body onload="generateTable()">

<?php  include('../nav.php');  include('server.php');?>

<form action = "createRSO.php" method = "post" onsubmit="return CheckBoxCount();">
    <?php include('errors.php'); ?> 
    <div class="d-flex align-items-center min-vh-100 " style="margin-bottom:50px;">
      <div class="container-fluid" style="width: 50%;">
          <table class="table table-bordered table-dark table-secondary table-hover">
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
                <input class="border border-dark " type="text" name="name" placeholder="Enter RSO Name" style="background-color: #F1C400;"required value = "<?php echo $name; ?>">
          </td>
          </tr>
          <tr style ="background-color: transparent;">
            <td>  
                <input class="btn btn-success text-dark" type="submit" value="Submit" name="create_rso"> 
             </td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" id = "arsize" name="arsize" value = "<?php echo $arsize; ?>">
    </div>
  </div>
<form>
  
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

