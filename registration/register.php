<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>COP4710 Project</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <div class= "container">
        <div class="title"><img src = "imgs/ucf.png"></div>
            <form action = "register.php" method = "post">
                <?php include('errors.php'); ?>
                <div class = "user-details">
                    <div class="input-box">
                        <span class = "details">Full Name</span>
                        <input type="fullname" name = "fullname" placeholder="Enter your name" required value = "<?php echo $fullname; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">User ID</span>
                        <input type="userid" name="userid" placeholder="Create your user ID" required value = "<?php echo $userid; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Password</span>
                        <input type = "password_1" name="password_1" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class = "details">Confirm Password</span>
                        <input type = "password_2" name="password_2" placeholder="Confirm Password" required>
                    </div>
                    <div class="input-box">
                        <span class = "details">University Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required value = "<?php echo $email; ?>">
                    </div>   
                </div>
            <div class = "gender-details">
                <input type="radio" name="gender" id="dot-1" value = "m" required>
                <input type="radio" name="gender" id="dot-2" value = "n" required>
                <input type="radio" name="gender" id="dot-3" value = "o" required>
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Other</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register" name="reg_user"> 
            </div>
           </form>
    </div>

</body>
</html>