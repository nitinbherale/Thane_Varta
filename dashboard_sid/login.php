 

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Shivsena Program Management System</title>
	
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
		 <script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		<script src="admin/dist/js/sweetalert-data.js"></script>
		<link href="admin/dist/css/style.css" rel="stylesheet" type="text/css">
		<script src="admin/dist/js/demo.js" ></script>
	</head>
	<body>

		<!--Preloader-->
		<!-- <div class="preloader-it">
			<div class="la-anim-1"></div>
		</div> -->
		<!--/Preloader-->
		<div class="wrapper  pa-0">
			<!-- <header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="../img/logo.png" alt="brand"/>
					</a>
				</div>
			</header> -->
			<!-- Main Content -->
			<?php //echo "this is my page";
			include("admin/connect.php");
			if(isValidUser())  redirect("admin/index.php");
				if(isset($_POST["login"]))
				{   
				$username=$_POST['username'];
				$password=$_POST['password']; 
				$msg=LgnChk($username,$password); 
				if($msg=="")    
				{
				    header("location:admin/index.php");
				}
				else{
					echo '<script>my_function("'.$msg.'");</script>';
				}   
			}
			?>
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign in to Siddhivinayak</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuser_2">Username</label>
													<input type="text" class="form-control" required name="username" id="exampleInputuser_2" placeholder="Enter Username">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<!-- <a class="capitalize-font txt-orange block mb-10 pull-right font-12" href="forgot-password.php">forgot password ?</a> -->
													<div class="clearfix"></div>
													<input type="password" class="form-control" required name="password" id="exampleInputpwd_2" placeholder="Enter Password">
												</div>
												<div class="form-group text-center">
													<button type="submit" name="login" class="btn btn-warning  btn-rounded">sign in</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="admin/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="admin/dist/js/init.js"></script>
	</body>

</html>
