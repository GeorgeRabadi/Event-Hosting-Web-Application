<?php include('server.php') ?>
<?php include('errors.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../mystyle.css">
    <script src="https://kit.fontawesome.com/50d8449c4c.js" crossorigin="anonymous"></script>
</head>
<body>





<form action = "login.php" method = "post">
    <div class="d-flex align-items-center min-vh-100" style="margin-bottom:50px;">
        <div class="container gy-5 border bg-warning rounded" style="width: 50%;">
            <div class="row justify-content-center">
                
                <div class = "col-12 text-center" ><img src = "../imgs/ucf.png"></div>
                <div class="w-100"></div>

                <label for="userID" class="col-lg-1 col-2" style="background-color: #F1C400;"> <i class="fa-solid fa-user" style="margin: 20px"></i></label>
                <input type="text" class="col-4 text-center input-field" id="userID" name="userID" placeholder="Enter user ID" required value = "<?php echo $userid; ?>">
                <div class="w-100"></div>

                <label for="password" class="col-lg-1 col-2" style="background-color: #F1C400;"> <i class="fa-solid fa-lock" style="margin: 20px"></i></label>
                <input type = "password" id="password" class="col-4 text-center input-field " name="password" placeholder="Enter your password" required>
                <div class="w-100"></div>

                <a href= "register.php" class="col-6 text-center">Don't have an account? Sign up here!</a>
                <div class="w-100"></div>

                <button class="btn btn-outline-dark custom_btn" type="submit" >Login</button>
                <div class="w-100"></div>
                

                <input  type="hidden" value="Log In" name="login_user" >
                <div class="w-100"></div>

            </div>
        </div> 
    </div> 
</form>
   

</body>
</html>

