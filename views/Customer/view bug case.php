<?php 
session_start();
if (!($_SESSION['role_id'] == 3)) 
{header("Location: ../registeration/index.php");}
?>
<?php 
require_once '../../models/Customer.php'; 
$cus = new Customer;
if (isset($_POST['addbug'])) { 
    if (isset($_POST["bug_name"]) and isset($_POST["project_name"]) and isset($_POST["necessity"])and isset($_POST["level"])) { 
        require_once '../../models/Bug.php';
        $bg = new Bug;
        $bg->set_name($_POST["bug_name"]); 
        $project_name = $_POST["project_name"]; 
        $bg->set_necessity($_POST["necessity"]); 
        $bg->set_level_id($_POST['level']); 
        $bg->set_details($_POST["details"]); 
        $cus->add_bug($bg->get_name(), $project_name, $bg->get_necessity(), $bg->get_level_id(), $bg->get_details()); 
        echo '<script>alert("Added successfully!")</script>'; 
    } 
    else 
    { 
        echo '<script>alert("Try again!")</script>'; 
        echo '<script>window.location= "addbug.php"</script>'; 
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
    <title>Bug Case Flow</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="../Admin/css/blank.css" rel="stylesheet">
    <!-- <link href="css/allmin.css" rel="stylesheet"> -->
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .container{
            padding: 20px !important;
            margin: 20px !important;
        }
        
        .boxContainer {
            /* margin: auto; */
            margin-top: -2%;
            /* position: relative; */
            width: 340px;
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

        .search3 {
            border: none;
            height: 100%;
            width: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            color: #424242;
            font-weight: 500;
        }

        .search3:focus {
            outline: none;

        }

        .fa-sm {
            font-size: 26;
            color: #2988b9;
            padding-right: 10px;
        }


        .table {
            width: 114%;
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
            margin-right: 10px;
        }

        /* table.table {
            table-layout: fixed;
            
        } */

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            width: 8px;
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
                require_once '../Admin/header.php'
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Bug Case Flow</h2>
                                </div>
                            </div>
                        </div>
                        <div class="boxContainer" style="background:white; padding-left: 10px; padding-top: 5px; margin-bottom: 10px; margin-left:889px;" >
                                <form action="" method="post">
                                    <table class="elementContainer">
                                        <tr>
                                            <td>
                                                <input type="text" placeholder="search by bug name" name="search3" class="search3" style="border:none;">
                                            </td>
                                            <td>
                                                <button type="submit" class="btnsearch3" name="btnsearch3" onclick="ke3()" style="border: none; background: none;">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <script>
                                window.onload =no_ke3(); 
                                function no_ke3(){document.cookie = 'key3=' + 0}
                                function ke3(){document.cookie = 'key3=' + 1}
                            </script>
                    <form action="solution.php" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ticket Number</th>
                                    <th>Bug Name</th>
                                    <th>Project Name</th>
                                    <th>Status</th>
                                    <th>Level</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Solving time (days)</th>
                                    <th>solution</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // require_once '../db/db.php';
                                if (isset($_POST['btnsearch3']) && $_COOKIE['key3'] == 1){
                                    $search = $_POST['search3'];
                                    $re = $cus->search_customer($_SESSION['id'], $search);
                                }
                                else{
                                $re = $cus->view_bug_case_flow($_SESSION['id']);
                                }
                                while ($row = $re->fetch_assoc()) {
                                    echo  '<tr>
                                    <td>' . $row["bug_id"] . '</td>
                                    <td>' . $row["bug_name"] . '</td>
                                    <td>' . $row["project_name"] . '</td>
                                    <td>' . $row["status"] . '</td>
                                    <td>' . $row["level"] . '</td>
                                    <td>' . $row["start_time"] . '</td>
                                    <td>' . $row["end_time"] . '</td>
                                    <td>' . $row["solving_time"] . '</td>
                                    <td><a href="solution.php" id="' . $row["bug_id"] . '" class="solution" type="submit" name="solution" >view solution</a></td> 
                                    </tr>';
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
    $(document).on("click", ".solution", function() {
        var x = ($(this).attr('id'));
        var bug_id;
        document.cookie = "bug_id1=" + x;
    });
</script>