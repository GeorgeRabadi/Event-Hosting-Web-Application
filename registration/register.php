<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class= "container">
        <div class="title"><img src = "../imgs/ucf.png"></div>
            <form action = "register.php" method = "post">
                <?php include('errors.php'); ?>
                <div class = "user-details">
                    <div class="input-box">
                        <span class = "details">User ID</span>
                        <input type="userid" name="userID" placeholder="Create your user ID" required value = "<?php echo $userid; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Password</span>
                        <input type = "password" name="password_1" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class = "details">Confirm Password</span>
                        <input type = "password" name="password_2" placeholder="Confirm Password" required>
                    </div>
                    <div class="input-box">
                        <span class = "details">University Email Domain</span>
                        <input type="text" name="universityName" placeholder='Ex: "Knights.ucf.edu"' required value = "<?php echo $universityName; ?>">
                    </div>   
                </div>
            <div class="button">
                <input type="submit" value="Register" name="reg_user"> 
            </div>
           </form>
    </div>

</body>
</html>