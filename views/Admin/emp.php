<?php 
session_start();
if (!($_SESSION['role_id'] == 1)) 
{header("Location: ../registeration/index.php");}
require_once '../../models/Admin.php';
require_once '../../models/Developer.php';
$ad = new Admin;
if (isset($_POST['update'])) {
    $dv = new Developer;
    $dv->set_username($_POST["user_name"]);
    $dv->set_name($_POST["name"]);
    $dv->set_address($_POST["address"]);
    $dv->set_phonenumber($_POST["phone_number"]);
    $old = $_COOKIE['old'];
    $ad->update_developer($dv->get_username(), $dv->get_name(), $dv->get_address(), $dv->get_phonenumber(), $old);
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

    <title>Manage Developer accounts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        .table{
            width:90%;
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
            padding-right: 18% !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]');
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="username" id="username"></td>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="address" id="address"></td>' +
                    '<td><input type="text" class="form-control" name="phone_number" id="phone_number"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]');
            });
            // Add row on add button click
            $(document).on("click", ".add", function() {
                <?php  
                    if(isset($_POST['add']))
                    {   
                        $dv = new Developer; 
                        $dv->set_username($_POST["username"]);
                        $dv->set_name($_POST["name"]);
                        $dv->set_address($_POST["address"]);
                        $dv->set_phonenumber($_POST["phone_number"]);
                        $ad->add_developer($dv->get_username(), $dv->get_name(), $dv->get_address(), $dv->get_phonenumber());
                    }  
                ?>
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function() {
                var x =($(this).attr('id'));
                var old;
                document.cookie = "old="+x;
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function() {
                var x =($(this).attr('id'));
                var username;
                document.cookie = "username="+x;
                <?php  
                    
                    if(isset($_POST['delete']))
                    {    
                        $username = $_COOKIE['username'];
                        $ad->delete_developer($username);
                    }  
                ?>
            });
        });
    </script>

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

                <div class="container">
        <form action="emp.php" method="post">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Developer Accounts</h2>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
               
                    $re = $ad->show_developers(); 
                        while($row = $re->fetch_assoc()){ 
                            echo  '                    <tr>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["address"].'</td>
                            <td>'.$row["phone_number"].'</td>
                            <td>
                                <button class="add sbtn" title="Add" data-toggle="tooltip" type="submit" name="add" ><i class="material-icons">&#xE03B;</i></button>
                                <a href="update.php" id="'.$row["username"].'" class="edit sbtn" title="Edit" data-toggle="tooltip" name="edit"><i class="material-icons">&#xE254;</i></a>
                                <button id="'.$row["username"].'" class="delete sbtn" title="Delete" data-toggle="tooltip" type="submit" name="delete" ><i class="material-icons">&#xE872;</i></button>
                        </td>  
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                require_once 'footer.php'
            ?>
</body>

</html>