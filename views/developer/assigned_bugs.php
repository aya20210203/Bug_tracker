<?php 
session_start();
if (!($_SESSION['role_id'] == 2)) 
{header("Location: ../registeration/index.php");}
?>
<?php 
require_once '../../models/Developer.php';
$dv = new Developer;
    if (isset($_POST['solve'])) {
        if (isset($_POST["bugname"]) and isset($_POST["solution"])) {
            if (($_POST["developer_username1"] == $_SESSION['username']) && ($_POST["name1"] == $_SESSION['name'])) {
                require_once '../../models/Bug.php';
                $bg = new Bug;
                $bg->set_name($_POST["bugname"]);
                $bg->set_solution($_POST["solution"]);
                $dv->send_solution($bg->get_name(), $bg->get_solution());
                echo '<script>alert("Sent successfully!")</script>';
            } else {
                echo '<script>alert("Wrong name or email!")</script>';
                echo '<script>window.location = "send_solution.php"</script>';
            }
        }
    } 
?>
<?php 
if (isset($_POST['assign'])) { 
    if (isset($_POST["developer_name"]) and isset($_POST["bug_name"])) { 
        if (($_POST["developer_username"] == $_SESSION['username']) && ($_POST["name"] == $_SESSION['name'])) {
        $username = $_POST["developer_name"]; 
        $name = $_POST["bug_name"]; 
        $dv->reassign_bug($username, $name); 
        echo '<script>alert("Re-assigned successfully!")</script>'; 
        } else {
            echo '<script>alert("Wrong name or email!")</script>';
            echo '<script>window.location = "reassign_bug.php"</script>';
        }
    }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assigned Bugs</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="../Admin/css/blank.css" rel="stylesheet">

    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .boxContainer {
            /* margin: auto; */
            margin-top: 1%;
            /* position: relative; */
            width: 656px;
            height: 42px;
            border: 3px solid #2980b9;
            padding: -1px 10px;
            border-radius: 50px;
        }

        .elementContainer {
            width: 100%;
            height: 100%;
            vertical-align: middle;


        }

        .search {
            border: none;
            height: 100%;
            width: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            color: #424242;
            font-weight: 500;
        }

        .search:focus {
            outline: none;

        }

        .fa-sm {
            font-size: 26;
            color: #2988b9;
            padding-right: 10px;
        }

        .container {
            margin: 10px;
        }

        .table {
            width: 100%;
            background-color: white;
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 30px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            width: 22%;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td .sbtn {
            background: none;
            border: none;
            cursor: pointer;
            margin: 0 5px;
        }

        table.table td .add {
            color: #27C46B;
        }

        table.table td .edit {
            color: #FFC107;
        }

        table.table td .delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td .add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }

        .col-sm-4 {
            padding-right: 11% !important;
            padding-top: 20px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once 'sidebar.php'
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once '../Admin/header.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Assigned Bugs</h2>
                            </div>
                            <div class="boxContainer" style="background:white; padding-left: 10px; padding-top: 5px;">
                            <form action="" method="post">
                                <table class="elementContainer">
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="search by bug name" name="search" class="search">
                                        </td>
                                        <td>
                                            <button type="submit" class="btnsearch" name="btnsearch" onclick="ke()" style="border: none; background: none;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <script>
                                window.onload =no_ke(); 
                                function no_ke(){document.cookie = 'key=' + 0}
                                function ke(){document.cookie = 'key=' + 1}
                            </script>
                            </div>
                            <div class="col-sm-4">
                                <a href="reassign_bug.php">
                                    <button type="button" class="btn btn-info add-new"><i class="fa-solid fa-share"></i> re-assign bug</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="details.php" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ticket Number</th>
                                    <th>Bug Name</th>
                                    <th>Project Name</th>
                                    <th>level</th>
                                    <th>status</th>
                                    <th>details</th>
                                    <th>necessity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                if (isset($_POST['btnsearch']) && $_COOKIE['key'] == 1){
                                    $search = $_POST['search'];
                                    $re = $dv->search_assigned_bugs($_SESSION['id'], $search);
                                }
                                else{
                                    $re = $dv->view_assigned_bugs($_SESSION['id']);
                                }
                                {
                                    while ($row = $re->fetch_assoc()) {
                                        echo  '                    <tr>
                                        <td>' . $row["bug_id"] . '</td>
                                        <td>' . $row["bug_name"] . '</td>
                                        <td>' . $row["project_name"] . '</td>
                                        <td>' . $row["level"]  . '</td>
                                        <td>' . $row["status"] . '</td>  
                                        <td><a href="details.php" id="' . $row["bug_id"] . '" class="details" type="submit" name="details" >view details</a></td> 
                                        <td>' . $row["necessity"] . '</td>                            
                                        </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php
            require_once '../Admin/footer.php'
            ?>

</body>

</html>
<script>
    $(document).on("click", ".details", function() {
        var x = ($(this).attr('id'));
        document.cookie = "bug_id=" + x;
    });
</script>