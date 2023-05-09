<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../project2/style/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="../../Bug tracking/Admin/css/blank.css"> -->
    <!-- <link rel="stylesheet" href="../../Bug tracking/Admin/css/main.css"> -->
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php            
            include("../../models/Admin.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $ad = new Admin;
                $ad->login($username, $password);
                }else{           
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="rem-for">
                    <label><input type="checkbox">
                    Remember me</label>
                    <a href='#'>Forget password?</a>
                </div>
                <div class="links">
                    Don't have account? <a href="sign_up.php">Sign Up Now</a>
                </div>
                <ul class="sci">
                    <li> Login with</li>
                    <i class="fa-brands fa-facebook" href='#' ></i>
                    <i class="fa-brands fa-google" href='#'></i>
                </ul>   
                
            </form>
        </div>
        <?php }  ?>
    </div>
</body>
</html>