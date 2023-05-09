<?php 
session_start();
if (!($_SESSION['role_id'] == 2)) 
{header("Location: ../registeration/index.php");}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Solution Form</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.register {
			background: -webkit-linear-gradient(left, #3931af, #00c6ff);
			margin-top: 5%;
			padding: 3%;
			width: 75%;
			height: 586px;
		}
		.formbold-textarea {
			display: flex;
			flex-direction: column;
		}

		.register-left {
			text-align: center;
			color: #fff;
			margin-top: 4%;
		}

		.register-left input {
			border: none;
			border-radius: 1.5rem;
			padding: 2%;
			width: 60%;
			background: #f8f9fa;
			font-weight: bold;
			color: #383d41;
			margin-top: 30%;
			margin-bottom: 3%;
			cursor: pointer;
		}

		.register-right {
			background: #f8f9fa;
			border-top-left-radius: 10% 50%;
			border-bottom-left-radius: 10% 50%;
		}

		.register-left img {
			margin-top: 15%;
			margin-bottom: 5%;
			width: 25%;
			-webkit-animation: mover 2s infinite alternate;
			animation: mover 1s infinite alternate;
		}

		@-webkit-keyframes mover {
			0% {
				transform: translateY(0);
			}

			100% {
				transform: translateY(-20px);
			}
		}

		@keyframes mover {
			0% {
				transform: translateY(0);
			}

			100% {
				transform: translateY(-20px);
			}
		}

		.register-left p {
			font-weight: lighter;
			padding: 12%;
			margin-top: -9%;
		}

		.register .register-form {
			padding: 10%;
			margin-top: 10%;
		}

		.btnRegister {
			float: right;
			margin-top: 93%;
			border: none;
			border-radius: 1.5rem;
			padding: 2%;
			background: #0062cc;
			color: #fff;
			font-weight: 600;
			width: 50%;
			cursor: pointer;
		}

		.register .nav-tabs {
			margin-top: 3%;
			border: none;
			background: #0062cc;
			border-radius: 1.5rem;
			width: 28%;
			float: right;
		}

		.register .nav-tabs .nav-link {
			padding: 2%;
			height: 34px;
			font-weight: 600;
			color: #fff;
			border-top-right-radius: 1.5rem;
			border-bottom-right-radius: 1.5rem;
		}

		.register .nav-tabs .nav-link:hover {
			border: none;
		}

		.register .nav-tabs .nav-link.active {
			width: 100px;
			color: #0062cc;
			border: 2px solid #0062cc;
			border-top-left-radius: 1.5rem;
			border-bottom-left-radius: 1.5rem;
		}

		.register-heading {
			text-align: center;
			margin-top: 8%;
			margin-bottom: -15%;
			color: #495057;
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

				<body oncontextmenu='return false' class='snippet-body'>
					<div class="container register">
						<div class="row">
							<div class="col-md-3 register-left">
								<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
								<h3>Welcome</h3>
								<p>You can send solution to customer!</p>
							</div>
							<div class="col-md-9 register-right">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<h3 class="register-heading">send solution</h3>
										<form action="assigned_bugs.php" method="post">
											<div class="row register-form" style="height:455px;">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" name="name1" placeholder="Developer Name" value="" required/>
													</div>
													<div class="form-group">
														<select class="form-control" name="bugname">
															<option class="hidden" selected disabled>Select Bug </option>
															<?php
															require_once '../../models/Developer.php';
															$dv = new Developer;
															$re = $dv->get_developer_unsolved_bugs($_SESSION['id']); 
															while ($row = $re->fetch_assoc()) {
																echo  '<option>' . $row["name"] . '</option>';
															}
															?>
														</select>
													</div>
													<div class="formbold-textarea">
														<label for="solution" class="formbold-form-label">Solution </label>
														<textarea rows="6" name="solution" id="solution" required placeholder="Enter your solution..." class="formbold-form-input"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<input type="email" class="form-control" name="developer_username1" placeholder="Developer Email" required value="" />
													</div>
												
													<input type="submit" class="btnRegister" value="Submit" name="solve" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</body>
				<!-- End of Main Content -->

				<!-- Footer -->
				<?php
                require_once '../Admin/footer.php'
            ?>

</body>

</html>