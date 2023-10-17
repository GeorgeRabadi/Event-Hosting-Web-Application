<!DOCTYPE html>
<html>

<head>
    <title>Comment On Event</title>
</head>

<body>

<?php  include('../nav.php');  include('server.php');?>

<form action = "commentEvent.php?eventName=<?php echo $eventName?>"  method = "POST">
    <input type = "hidden"  id = "eventValue" name="eventName" value= "<?= $eventName ?>" required>
    <div class="d-flex justify-content-center mb-5">
        <div class="container-sm mt-5 border border-dark bg-dark rounded w-25">
            <div class="row gy-2 mt-5 mb-5 ml-2">
       
                <div class="w-100"></div>

                <div class="form-group col-10">
                    <label class="bg-dark text-light" for="comment">Rate and comment on <?= $eventName ?></label>
                    <textarea type="text" class="form-control form-control-lg" id="comment" name="comment" aria-describedby="comment" placeholder="Enter your comment" required></textarea>
                </div>
                <div class="w-100"></div>

                
                <div class="col-4"><button class="btn btn-lg btn-outline-light custom_btn" type="submit">Add Comment</button></div>  
                <input type="hidden" name="submit_comment" value="commentSubmitted" >  
                
                <div class="form-check form-check-inline col-1">
                    <input class="form-check-input" type="radio" name="rating" id="dot-1" required value = "1">
                    <label class="form-check-label bg-dark text-light" for="dot-1">1</label>
                </div>

                <div class="form-check form-check-inline col-1">
                    <input class="form-check-input" type="radio" name="rating" id="dot-2" required value = "2">
                    <label class="form-check-label bg-dark text-light" for="dot-2" >2</label>
                </div>

                <div class="form-check form-check-inline col-1">
                    <input class="form-check-input" type="radio" name="rating" id="dot-3" required value = "3">
                    <label class="form-check-label bg-dark text-light" for="dot-3">3</label>
                </div>

                
                <div class="form-check form-check-inline col-1">
                    <input class="form-check-input" type="radio" name="rating" id="dot-4" required value = "4">
                    <label class="form-check-label bg-dark text-light" for="dot-4">4</label>
                </div>

                
                <div class="form-check form-check-inline col-1">
                    <input class="form-check-input" type="radio" name="rating" id="dot-5" required value = "5">
                    <label class="form-check-label bg-dark text-light" for="dot-5">5</label>
                </div>

            </div>
        </div>
    </div>
</form>









<script>

        var eventName = <?php echo json_encode($eventName); ?>;
        var userName = <?php echo json_encode($userID); ?>;
        
        var userArray = <?php echo json_encode($userArray); ?>;
        var textArray = <?php echo json_encode($textArray); ?>;
        var ratingArray = <?php echo json_encode($ratingArray); ?>;
        var length = userArray.length;
        var k = 0;

        
        for(var i = 0; i<length; i++)
        {
            if(userName != userArray[i])
                document.body.insertAdjacentHTML('beforeend', `
            <div class="d-flex justify-content-center mb-5">
                <div class="container-sm mt-5 border border-dark bg-dark rounded w-25">
                    <div class="row gy-2 mt-2 mb-2 ml-2">
                        <div class="form-group col-10">
                            <div class="bg-dark text-light mb-2 userID" for="comment"></div>
                            <textarea disabled class="form-control form-control-lg text"></textarea>
                        </div>
                        <div class="w-100"></div>
                        <div class = "col-6 text-light static-rating"></div>
                    </div>
                </div>
            </div>
            `);
            else
                document.body.insertAdjacentHTML('beforeend', `<form action = "commentEvent.php?eventName=<?php echo $eventName?>"   method = "POST">  
                    <div class="d-flex justify-content-center mb-5">
                        <div class="container-sm mt-5 border border-dark bg-dark rounded w-25">
                            <div class="row gy-2 mt-2 mb-2 ml-2">
                                <input type = "hidden"  class = "textValue" name="textValue"  required>     
                                <div class="form-group col-10">
                                    <div class="bg-dark text-light mb-2 userID" for="comment"></div>
                                        <textarea disabled class="form-control form-control-lg text"></textarea>
                                    </div>
                            <div class="w-100"></div>
                                <div class = "col-4 text-light static-rating"></div>
                                <div class="w-100"></div>
                                <button class="btn btn-lg btn-outline-warning custom_btn col-3" type="submit" name="edit_comment">Edit</button>  
                                <button class="btn btn-lg btn-outline-danger custom_btn col-3" type="submit" name="delete_comment">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>`);
   
                

            var userID= document.getElementsByClassName("userID")[i];
            userID.innerHTML = userArray[i] + " says:";

            var comment = document.getElementsByClassName("text")[i];
            comment.innerHTML = textArray[i];

            var rating = document.getElementsByClassName("static-rating")[i];
            rating.innerHTML = "Rating: " + ratingArray[i];

            if(userName == userArray[i])
            {
                    document.getElementsByClassName("textValue")[k].value = textArray[i];
                    k++;
            }

        }
        

</script>

</body>

</html>