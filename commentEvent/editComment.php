

<!DOCTYPE html>
<html>

<head>
    <title>Edit Comment</title>
</head>

<body>

<?php include('../nav.php'); include('server.php'); ?>;


<form action = "commentEvent.php?eventName=<?php echo $eventName?>"   method = "POST">
    <input type = "hidden"  id = "eventValue" name="eventName"  required>
    <input type = "hidden"  id = "oldText" name="oldText"  value = "<?php echo $oldText; ?>" required>
    <div class="d-flex justify-content-center mb-5">
        <div class="container-sm mt-5 border border-dark bg-dark rounded w-25">
            <div class="row gy-2 mt-5 mb-5 ml-2">
       
                <div class="w-100"></div>

                <div class="form-group col-10">
                    <label class="bg-dark text-light" for="comment">Edit your comment on <?= $eventName ?></label>
                    <textarea type="text" class="form-control form-control-lg" id="comment" name="comment" aria-describedby="comment" placeholder="Edit your comment" required><?php echo $oldText; ?></textarea>
                </div>
                <div class="w-100"></div>

                
                <div class="col-4"><button class="btn btn-lg btn-outline-light custom_btn" type="submit">Edit Comment</button></div>  
                <input type="hidden" name="submit_new_comment" value="commentEdited" >  
                
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


</body>

</html>