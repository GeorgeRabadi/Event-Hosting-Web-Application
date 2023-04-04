<?php include('server.php') ?>;

<!DOCTYPE html>
<html>

<head>
    <title>Edit Comment</title>
    <link rel="stylesheet" href="style.css">
</head>

<div class="navbar">
          <a class="active" href="../homepage/homepage.php">Home</a>
          <a href="../createEvent/createEvent.php">Create Event</a>
          <a href="../createRSO/createRSO.php">Create RSO</a>
          <a href="../displayEvents/displayEvents.php">See Events</a>
          <a href="../displayRSOs/displayRSOs.php">See RSOs</a>
          <a href="../displayUniversity/displayUniversity.php">See University</a>
          <a href="../requestedRSOs/requestedRSOs.php">Pending RSOs</a>
          <a href="../requestedEvents/requestedEvents.php">Pending Events</a>
          <a href="../createUniversity/createUniversity.php">Create University</a>
  </div>

<body>
<form action = "commentEvent.php?eventName=<?php echo $eventName?>"   method = "POST">
<input type = "hidden"  id = "eventValue" name="eventName"  required>
<input type = "hidden"  id = "oldText" name="oldText"  value = "<?php echo $oldText; ?>" required>
    <div class="card">
        <div class="row">
            <div class="col-10">
                <div class="comment-box ml-2">
                    <h4 id = "eventName">Edit Your Comment!</h4>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                    </div>
                    <div class="comment-area">
                        <textarea name = "comment" class="form-control" rows="4" required><?php echo $oldText; ?></textarea>
                    </div>
                    <div class="comment-btns mt-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="pull-right">
                                    <button type = "submit" class="btn btn-success send btn-sm" name="submit_new_comment">Submit <i
                                    class="fa fa-long-arrow-right ml-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


</body>

</html>