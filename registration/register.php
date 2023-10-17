<?php include('server.php') ?>
<?php include('errors.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../mystyle.css">
</head>
<body>

<form action = "register.php" method = "post">
    <div class="d-flex align-items-center min-vh-100" style="margin-bottom:50px;">
        <div class="container gy-5 border bg-warning rounded" style="width: 50%;">
            <div class="row justify-content-center">

                <div class = "col-12 text-center" ><img src = "../imgs/ucf.png"></div>

                <label for="userID" class="col-lg-1 col-2 label text-center">User ID</label>
                <input class="col-4 text-center input-field " type="text" name="userID" id="userID" placeholder="Create your user ID" required value = "<?php echo $userid; ?>">
                <div class="w-100"></div>


                <label for="password1" class="col-lg-1 col-2 label text-center">Password</label>
                <input class="col-4 text-center input-field " id="password1" type = "password" name="password_1" placeholder="Enter your password" required>
                <div class="w-100"></div>

                <label for="password2" class="col-lg-1 col-2 label text-center">Confirm</label>
                <input  class="col-4 text-center input-field " id="password2" type = "password" name="password_2" placeholder="Confirm Password" required>
                <div class="w-100"></div>

                <label for="email" class="col-lg-1 col-2 label text-center">Domain</label>
                <input class="col-4 text-center input-field " id="email" type="text" name="universityName" placeholder='Ex: "Knights.ucf.edu"' required value = "<?php echo $universityName; ?>">
                <div class="w-100"></div>
                

                <a href= "login.php" class="col-6 text-center">Already have an account? Login!</a>
                <div class="w-100"></div>

                <button class="btn btn-outline-dark custom_btn" type="submit" >Signup</button>
                <div class="w-100"></div>


                <input  type="hidden" value="Register" name="reg_user">
                <div class="w-100"></div>

            </div>
        </div> 
    </div> 
</form>



</body>
</html>