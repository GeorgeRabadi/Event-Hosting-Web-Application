<?php 

  session_start();

  
  if (!isset($_SESSION['userID'])){
    header("Location: ../registration/login.php");
    die;}

?>

<head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/mystyle.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>


<div class="pos-f-t">
  <nav class="navbar navbar-light">
    <button class="navbar-toggler border border-dark rounded" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="collapse" id="navbarToggleExternalContent">
      <ul class="nav nav-pills nav-justified bg-dark">
        <li class="nav-item navbar-brand active">
          <a class="nav-link" href="../homepage/homepage.php">
            Home
          </a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../displayEvents/displayEvents.php">Events</a>
        </li>
        <li class="nav-item navbar-brand  active ">
          <a class="nav-link"  href="../createEvent/createEvent.php">Add Event</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../requestedEvents/requestedEvents.php">Event Creation Requests</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../displayRSOs/displayRSOs.php">RSOs</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../createRSO/createRSO.php">Add RSO</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../requestedRSOs/requestedRSOs.php">RSO Creation Requests</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../rsoJoinRequests/rsoJoinRequests.php">RSO Join Requests</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../displayUniversity/displayUniversity.php">Universities</a>
        </li>
        <li class="nav-item navbar-brand active ">
          <a class="nav-link"  href="../createUniversity/createUniversity.php">Add University</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link"  href="../logout.php">
              <div class ="text-success">
                Logged in as <?=  $_SESSION['userID'] ?>
              </div>
              <div>
                <button class = "btn btn-danger text-dark">
                  Logout         
              </button></a>
              </div>
        </li>
      </ul>
  </div>
</div>
