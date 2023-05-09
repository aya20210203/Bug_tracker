<?php 
session_start();
if (!($_SESSION['role_id'] == 1)) 
{header("Location: ../registeration/index.php");}
require_once '../../models/Admin.php';
$ad = new Admin;
if (isset($_POST['assign'])) {
    if (($_POST["admin_email"] == $_SESSION['username']) && ($_POST["admin_name"] == $_SESSION['name'])) {
        $username = $_POST["developer_name"];
        $name = $_POST["bug_name"];
        $ad->assign_bug($username, $name);
        echo '<script>alert("Assigned successfully!")</script>';
    }
    else
    {
        echo '<script>alert("Wrong name or email!")</script>';
        echo '<script>window.location= "assigntoDevlo.php"</script>';
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
    <script src="jquery-3.3.1.min.js"></script>

    <title>Bug Case Flow</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="css/blank.css" rel="stylesheet">
    <!-- <link href="css/allmin.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            width: 611px;
            height: 42px;
            border: 3px solid #2980b9;
            padding: -1px 10px;
            border-radius: 50px;
            margin-right: 179px;
        }

        .elementContainer {
            width: 100%;
            height: 100%;
            vertical-align: middle;


        }

        .search1 {
            border: none;
            height: 100%;
            width: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            color: #424242;
            font-weight: 500;
        }

        .search1:focus {
            outline: none;

        }

        .fa-sm {
            font-size: 26;
            color: #2988b9;
            padding-right: 10px;
        }


        .table {
            width: 90%;
            background-color: white;
        }

        .table-wrapper {
            width: 900px;
            margin: 107px auto;
            background: #fff;
            padding: 30px;

            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 30px;
        }



        table.table {
            /* table-layout: fixed; */
            padding-top: 100px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }



        table.table td i {
            font-size: 19px;
        }

        .col-sm-4 {
            padding-right: 11% !important;
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

        .container {
            margin-bottom: 70px;
            margin-left: 70px;
            margin-top: -44px;
            padding-bottom: 300px;
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
            </div>
            <!-- End of Topbar -->

            <!-- download icon -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <button onclick="makePdf()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Bug case flow Report</button>
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

            <div id="print" class="container">
                <!-- <div class="table-wrapper"> -->
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Bug Case Flow</h2>
                        </div>
                        <div class="boxContainer" style="background:white; padding-left: 10px; padding-top: 5px;">
                            <form action="" method="post">
                                <table class="elementContainer">
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="search by bug name" name="search1" class="search1" style="border:none;">
                                        </td>
                                        <td>
                                            <button type="submit" class="btnsearch1" name="btnsearch1" onclick="ke1()" style="border: none; background: none;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <script>
                            window.onload = no_ke1();

                            function no_ke1() {
                                document.cookie = 'key1=' + 0
                            }

                            function ke1() {
                                document.cookie = 'key1=' + 1
                            }
                        </script>

                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Ticket Number</th>
                            <th>Bug Name</th>
                            <th>Project Name</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Necessity</th>
                            <th>Developer </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        require_once '../../models/Admin.php';
                        if (isset($_POST['btnsearch1']) && $_COOKIE['key1'] == 1) {
                            $search = $_POST['search1'];
                            $re = $ad->search_admin_case_flow($search);
                        } else {
                            $re = $ad->show_bug_case_flow();
                        }

                        while ($row = $re->fetch_assoc()) {
                            echo  '<tr>
                                <td>' . $row["bug_id"] . '</td>
                                <td>' . $row["bug_name"] . '</td>
                                <td>' . $row["project_name"] . '</td>
                                <td>' . $row["status"] . '</td>
                                <td>' . $row["level"] . '</td>
                                <td>' . $row["necessity"] . '</td>
                                <td>' . $row["developer"] . '</td>                        
                                </tr>';
                        }

                        ?>
                    </tbody>
                </table>
                <!-- </div> -->
            </div>

            <!-- Footer -->
            <?php
            require_once 'footer.php'
            ?>

</body>

</html>