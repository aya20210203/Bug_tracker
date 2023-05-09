<?php 
session_start();
if (!($_SESSION['role_id'] == 1)) 
{header("Location: ../registeration/index.php");}
?>
<!doctype html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <link href='' rel='stylesheet'>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .input100{
            height: calc(3em + 0.75rem + 7px);
            border: none;
            padding-left: 18px;
        }
        body,
        html {
            height: 100%;
            font-family: SourceSansPro-Regular, sans-serif;
        }

        a {
            font-family: SourceSansPro-Regular;
            font-size: 14px;
            line-height: 1.7;
            color: #666666;
            margin: 0px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
        }

        a:focus {
            outline: none !important;
        }

        a:hover {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0px;
        }

        p {
            font-family: SourceSansPro-Regular;
            font-size: 14px;
            line-height: 1.7;
            color: #666666;
            margin: 0px;
        }

        ul,
        li {
            margin: 0px;
            list-style-type: none;
        }

        input {
            outline: none;
            border: none;
        }

        textarea {
            outline: none;
            border: none;
        }

        textarea:focus,
        input:focus {
            border-color: transparent !important;
        }


        input::-webkit-input-placeholder {
            color: #999999;
        }

        input:-moz-placeholder {
            color: #999999;
        }

        input::-moz-placeholder {
            color: #999999;
        }

        input:-ms-input-placeholder {
            color: #999999;
        }

        textarea::-webkit-input-placeholder {
            color: #999999;
        }

        textarea:-moz-placeholder {
            color: #999999;
        }

        textarea::-moz-placeholder {
            color: #999999;
        }

        textarea:-ms-input-placeholder {
            color: #999999;
        }

        button {
            outline: none !important;
            border: none;
            background: transparent;
        }

        button:hover {
            cursor: pointer;
        }

        iframe {
            border: none !important;
        }

        .container {
            max-width: 1200px;
        }

        .container-contact100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            position: relative;
            /* z-index: 1; */
        }

        .container-contact100::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(93, 84, 240, 0.5);
            background: -webkit-linear-gradient(left, rgba(0, 168, 255, 0.5), rgba(185, 0, 255, 0.5));
            background: -o-linear-gradient(left, rgba(0, 168, 255, 0.5), rgba(185, 0, 255, 0.5));
            background: -moz-linear-gradient(left, rgba(0, 168, 255, 0.5), rgba(185, 0, 255, 0.5));
            background: linear-gradient(left, rgba(0, 168, 255, 0.5), rgba(185, 0, 255, 0.5));
            pointer-events: none;
        }

        .contact100-map {
            position: absolute;
            z-index: -2;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .wrap-contact100 {
            width: 800px;
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            border-radius: 10px;
            overflow: hidden;
            padding: 72px 150px 25px 150px;

            box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
        }



        .contact100-form {
            width: 100%;
        }

        .contact100-form-title {
            display: block;
            font-family: SourceSansPro-Bold;
            font-size: 30px;
            color: #fff;
            line-height: 1.2;
            text-align: center;
            padding-bottom: 34px;
        }


        .wrap-input100 {
            width: 100%;
            position: relative;
            background-color: #fff;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .input100 {
            display: block;
            width: 100%;
            background: transparent;
            font-family: SourceSansPro-Bold;
            font-size: 16px;
            color: #4b2354;
            line-height: 1.2;
        }


        input.input100 {
            height: 62px;
            padding: 0 20px 0 23px;
        }


        textarea.input100 {
            min-height: 199px;
            padding: 19px 20px 0 23px;
        }


        .focus-input100 {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
            -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
            -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .input100:focus+.focus-input100 {
            box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
            -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
            -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
            -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .container-contact100-form-btn {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 10px;
            padding-bottom: 43px;
        }

        .contact100-form-btn {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 160px;
            height: 42px;
            background-color: #0062cc;
            border-radius: 21px;

            font-family: JosefinSans-Bold;
            font-size: 14px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;
            padding-top: 5px;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;

            box-shadow: 0 10px 30px 0px rgba(255 255 255 / 50%);
            -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
            -webkit-box-shadow: 0 10px 30px 0px rgba(255 255 255 / 50%);
            -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
            -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
        }

        .contact100-form-btn:hover {
            background-color: #4b2354;
            box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
            -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
            -webkit-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
            -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
            -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
        }

        @media (max-width: 768px) {
            .wrap-contact100 {
                padding: 72px 50px 25px 50px;
            }
        }

        @media (max-width: 576px) {
            .wrap-contact100 {
                padding: 72px 15px 25px 15px;
            }
        }


        .validate-input {
            position: relative;
        }

        .alert-validate .focus-input100 {
            box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
            -moz-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
            -webkit-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
            -o-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
            -ms-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
        }

        .alert-validate::before {
            content: attr(data-validate);
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            position: absolute;
            width: 100%;
            min-height: 62px;
            background-color: #fff;
            border-radius: 20px;
            top: 0px;
            left: 0px;
            padding: 0 45px 0 22px;
            pointer-events: none;

            font-family: SourceSansPro-Bold;
            font-size: 16px;
            color: #fa4251;
            line-height: 1.2;
        }

        .btn-hide-validate {
            font-family: Material-Design-Iconic-Font;
            font-size: 15px;
            color: #fa4251;
            cursor: pointer;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            height: 62px;
            top: 0px;
            right: 28px;
        }

        .rs1-alert-validate.alert-validate::before {
            background-color: #fff;
        }

        .true-validate::after {
            content: "\f269";
            font-family: Material-Design-Iconic-Font;
            font-size: 15px;
            color: #57b846;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            height: 62px;
            top: 0px;
            right: 28px;
        }

        @media (max-width: 576px) {
            .alert-validate::before {
                padding: 0 30px 0 10px;
            }

            .true-validate::after,
            .btn-hide-validate {
                right: 10px;
            }
        }

        .contact100-more {
            font-family: SourceSansPro-Regular;
            font-size: 16px;
            color: #999999;
            line-height: 1.5;
            text-align: center;
        }

        .contact100-more-highlight {
            color: #bd59d4;
        }
    </style>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="viewprojects.php" method="post">
                <span class="contact100-form-title">
                    Add Project Details ..
                </span>

                <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                    <input class="input100" type="text" name="project_name" placeholder="Project name" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter email: e@a.x">
                    <input class="input100" type="text" name="team_name" placeholder="Team Name" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <select class="input100" name="customer_name">
                        <option class="hidden" selected disabled >Customer Name</option>
                        <?php
                        require_once '../../models/Admin.php';
                        $ad = new Admin;
                        $re = $ad->get_customers();
                        while ($row = $re->fetch_assoc()) {
                            echo  '<option>' . $row["name"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="container-contact100-form-btn">
                    <button name="add_btn" class="contact100-form-btn" type="submit">
                        ADD
                    </button>
                </div>
            </form>


        </div>
    </div>
    <script type='text/javascript'></script>
</body>

</html>