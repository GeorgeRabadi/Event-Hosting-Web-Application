<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class= "container">
        <div class="title"><img src = "../imgs/ucf.png"></div>
            <form action = "login.php" method = "post">
                <?php include('errors.php'); ?>
                <div class = "user-details">
                    <div class="input-box">
                        <span class = "details">User ID</span>
                        <input type="userid" name="userID" placeholder="Enter user ID" required value = "<?php echo $userid; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Password</span>
                        <input type = "password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <a href= "register.php"><span>Don't have an account? Sign up here!</span></a>
                    </div>
                </div>
            <div class="button">
                <input type="submit" value="Log In" name="login_user"> 
            </div>
           </form>
    </div>

</body>
</html>