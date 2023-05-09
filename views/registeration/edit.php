<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="profile.php">Bug Tracker</a></p>
        </div>
        <div class="right-links">
            <a href="../index.php"> <button class="btn" style="width:100px;">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $id = $_SESSION['id'];
                $edit_query = mysqli_query($con, "UPDATE user SET username='$username', phone_number='$phone_number', password='$password', address='$address'  WHERE id=$id ") or die("error occurred");
                if ($edit_query) {
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
                    echo "<a href='profile.php'><button class='btn'>my profile</button>";
                }
            } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM user WHERE id=$id ");
                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['username'];
                    $res_Pnumber = $result['phone_number'];
                    $res_Password = $result['password'];
                    $res_Address = $result['address'];
                }
            ?>
                <header>Change Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Email</label>
                        <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="phone_numer">phone nubmer</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?php echo $res_Pnumber; ?>" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $res_Address; ?>" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Update" required>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>
</html>