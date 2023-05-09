<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $verify_query = mysqli_query($con, "SELECT username FROM user WHERE username='$username'");
                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                    <p>This username is used, Try another One!</p>
                    </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    mysqli_query($con, "INSERT INTO user(username, phone_number, password, name, address, role_id) VALUES('$username','$phone_number','$password','$name','$address', 3)") or die("Error,please try again");
                    echo "<div class='message'>
                    <p>Registerd successfully!</p>
                    </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login from here</button>";
                }
            } else {
            ?>
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Phone number</label>
                        <input type="text" name="phone_number" id="phone_number" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="email">Name</label>
                        <input type="text" name="name" id="name" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="age">Address</label>
                        <input type="text" name="address" id="address" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value=" sign up " required>
                    </div>
                    <div class="links">
                        Already a member? <a href="index.php" style="padding-left: 170px;">log In</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>