<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../mystyle.css">
</head>
<body>



<?php include('../nav.php'); ?> 

<div class="d-flex align-items-center min-vh-100" style="margin-bottom:50px;">
    <div class="container-fluid" style="width: 50%;">
        <div class="row justify-content-center gy-2">

            <img class="col-5"  src = "../imgs/ucf.png" alt = "Statue"/>

            <div class="w-100"></div>
            <h1 class="col-12 text-center" style="font-weight: bold; color: #F1C400;">Welcome, <?=  $userID ?>!</h1>

        </div>
    </div>
</div>

<div id="Bar" class="bar">
</div>
</html>