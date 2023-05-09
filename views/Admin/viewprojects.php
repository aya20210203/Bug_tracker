<?php 
session_start();
if (!($_SESSION['role_id'] == 1)) 
{header("Location: ../registeration/index.php");}
require_once '../../models/admin.php';
require_once '../../models/Project.php';
$ad = new Admin;
$pro = new Project;
if (isset($_POST['add_btn'])) {
    $pro->set_name($_POST["project_name"]);
    $pro->set_team_name($_POST["team_name"]);
    $x = $_POST["customer_name"];
    $ad->add_project($pro->get_name(), $pro->get_team_name(), $x);
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
    <script src="jquery-3.3.1.min.js"></script>

    <title>Projects</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="css/blank.css" rel="stylesheet">
    <!-- <link href="css/allmin.css" rel="stylesheet"> -->
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .shadow-sm
        {
            margin-left: 1100px;
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

        .search2 {
            border: none;
            height: 100%;
            width: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            color: #424242;
            font-weight: 500;
        }

        .search2:focus {
            outline: none;

        }

        .fa-sm {
            font-size: 26;
            color: #2988b9;
            padding-right: 10px;
        }

        .container {
            margin-left: 70px;
            margin-top: -44px;

        }

        .table {
            width: 90%;
            background-color: white;
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            /* display: inline-block; */

        }

        .table-title h2 {
            margin: 9px -1px 16px;
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
            /* padding-left: 950px !important; */
            padding-right: 180px !important;
            /* padding-top: -15px;
            margin-bottom: 50px; */
            padding-top: 15px;

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
                require_once 'header.php';
                ?>
                <!-- End of Topbar -->

                <!-- download icon -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <button onclick="makePdf()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> projects Report</button>
                </div>
                <script>
                    function makePdf() {
                        var printMe = document.getElementById('print');
                        var wme = window.open("", "", "width:1000,height:900");
                        wme.document.write(printMe.outerHTML);
                        wme.document.close();
                        wme.focus();
                        wme.print();
                        wme.close();
                    }
                </script>
                <!-- End of download icon -->


                <!-- Begin Page Content -->

                <div id="print" class="container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Projects Details</h2>
                            </div>

                            <div class="boxContainer" style="background:white; padding-left: 10px; padding-top: 5px;">
                                <form action="" method="post">
                                    <table class="elementContainer">
                                        <tr>
                                            <td>
                                                <input type="text" placeholder="search by project name" name="search2" class="search2" style="border:none;">
                                            </td>
                                            <td>
                                                <button type="submit" class="btnsearch2" name="btnsearch2" onclick="ke2()" style="border: none; background: none;">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <script>
                                window.onload = no_ke2();

                                function no_ke2() {
                                    document.cookie = 'key2=' + 0
                                }

                                function ke2() {
                                    document.cookie = 'key2=' + 1
                                }
                            </script>
                            <div class="col-sm-4">
                                <a href="addProject.php">
                                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                </a>
                            </div>
                            <form action="emp.php" method="post">


                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Team Name</th>
                                <th>Customer Name</th>
                                <th>Unsolved Bugs</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['btnsearch2']) && $_COOKIE['key2'] == 1) {
                                $search = $_POST['search2'];
                                $re = $ad->search_projects($search);
                            } else {
                                $re = $ad->show_projects();
                            }
                            while ($row = $re->fetch_assoc()) {
                                echo  '                    <tr>
                                    <td>' . $row["project_name"] . '</td>
                                    <td>' . $row["team_name"] . '</td>
                                    <td>' . $row["customer_name"] . '</td>
                                    <td>' . $ad->project_bugs($row["project_name"]) . '</td>
                                    <td>' . $row["date"] . '</td>
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
            require_once 'footer.php'
            ?>

</body>

</html>