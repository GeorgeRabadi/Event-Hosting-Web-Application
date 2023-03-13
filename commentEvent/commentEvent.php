<?php include('server.php') ?>;

<!DOCTYPE html>
<html>

<head>
    <title>Comment On Event</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action = "commentEvent.php?eventName=<?php echo $eventName?>"   method = "POST">
<input type = "hidden"  id = "eventValue" name="eventName"  required>
    <div class="card">
        <div class="row">
            <div class="col-10">
                <div class="comment-box ml-2">
                    <h4 id = "eventName"></h4>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                    </div>
                    <div class="comment-area">
                        <textarea name = "comment" class="form-control" placeholder="Enter Your Comment" rows="4" required></textarea>
                    </div>
                    <div class="comment-btns mt-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="pull-right">
                                    <button type = "submit" class="btn btn-success send btn-sm" name="submit_comment">Submit <i
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






    <script>

            var eventName = <?php echo json_encode($eventName); ?>;
            var userName = <?php echo json_encode($userID); ?>;
            
            var eventHeader = document.getElementById("eventName");
            eventHeader.innerHTML = "Leave Your Comment On" + eventName + "!";

            var eventValue = document.getElementById("eventValue");
            eventValue.value = eventName;

            var userArray = <?php echo json_encode($userArray); ?>;
            var textArray = <?php echo json_encode($textArray); ?>;
            var ratingArray = <?php echo json_encode($ratingArray); ?>;
            var length = userArray.length;
            var k = 0;

            
            for(var i = 0; i<length; i++)
            {
                if(userName != userArray[i])
                    document.body.insertAdjacentHTML('beforeend', '<div class="row">    <div class="col-8">        <div class="card card-white post">            <div class="post-heading">                <div class="float-left meta">                    <div class="title h5">                        <b class="userID"></b>                        Says:                    </div> <div class="static-rating"></div>                </div>            </div>             <div class="post-description">                 <p class = "text"></p>            </div>        </div>    </div> </div>>');
                else
                    document.body.insertAdjacentHTML('beforeend', '<div class="row">    <div class="col-8">        <div class="card card-white post">            <div class="post-heading">                <div class="float-left meta">                    <div class="title h5">                        <b class="userID"></b>                        Says:                    </div> <div class="static-rating"></div>                </div>            </div>             <div class="post-description">                 <p class = "text"></p>            </div> <form action = "commentEvent.php?eventName=<?php echo $eventName?>"   method = "POST">            <button type = "submit" class="btn btn-success send btn-sm" name="edit_comment">Edit<i            class="fa fa-long-arrow-right ml-1"></i></button>            <button type = "submit" class="btn btn-success send btn-sm" name="delete_comment">Delete<i            class="fa fa-long-arrow-right ml-1"></i></button>      <input type = "hidden"  class = "textValue" name="textValue"  required>                                          </form>        </div>    </div> </div>>');
                    

                var userID= document.getElementsByClassName("userID")[i];
                userID.innerHTML = userArray[i];

                var comment = document.getElementsByClassName("text")[i];
                comment.innerHTML = textArray[i];

                var rating = document.getElementsByClassName("static-rating")[i];

                for(var j = 0; j<ratingArray[i]; j++)
                {
                    var paragraph = rating.appendChild(document.createElement("p"));
                    paragraph.innerHTML = "★";
    
                }

                if(userName == userArray[i])
                {
                        document.getElementsByClassName("textValue")[k].value = textArray[i];
                        k++;
                }

            }
        

    </script>

</body>

</html>