<?php
session_start();
$id = $_SESSION['id'];
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
    <title>myprofile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="../index.php">Profile</a> </p>
        </div>
        <div class="right-links">
            <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM user WHERE id=$id");
            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['username'];
                $res_Pnumber = $result['phone_number'];
                $res_Name = $result['name'];
                $res_Address = $result['address'];
                $res_id = $result['id'];
                $res_role_id = $result['role_id'];
            }
            echo "<a href='edit.php?id=$res_id'>Update Profile</a>";
            ?>
            <a href="logout.php"> <button class="btn" style="width: 100px;" >Log Out</button> </a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Your Email is <b><?php echo $res_Uname ?></b>.</p>
                </div>
                <div class="bot">
                    <div class="box">
                        <p>your phone is <b><?php echo $res_Pnumber ?></b>.</p>
                    </div>
                </div>
                <div class="boot">
                    <div class="box">
                        <p>Your name is <b><?php echo $res_Name ?></b>, welcome!</p>
                    </div>
                </div>
                <div class="bottom">
                    <div class="box">
                        <p>Your Address <b><?php echo $res_Address ?></b>.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>