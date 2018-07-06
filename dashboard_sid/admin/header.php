
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Thane Varta</title>
	<!-- Data table CSS -->
	<link rel="shortcut icon" href="logo_icon.ico">
	<link rel="icon" type="image/x-icon" href="logo_icon.ico" />

	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	<link href="vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	
	<script src="dist/js/demo.js" type="text/javascript"></script>
</head>
<body>
<!-- Top Menu Items -->
<?php include('connect.php');?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="#">
							<!--<img class="brand-img" src="img/siddhivinayak_logo.png" alt="logo"/>-->
							<span class="brand-text">Thane Varta</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" style="padding-top: 21px;" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" style="padding-top:16px;" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown app-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
						<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
							<li>
								<div class="app-nicescroll-bar">
									<ul class="app-icon-wrap pa-10">
										
										<li>
											<a href="#" class="connection-item">
											<i class="zmdi zmdi-email-open txt-success"></i>
											<span class="block">e-mail</span>
											</a>
										</li>
										<li>
											<a href="#" class="connection-item">
											<i class="zmdi zmdi-calendar-check txt-primary"></i>
											<span class="block">calendar</span>
											</a>
										</li>
										<li>
											<a href="#" class="connection-item">
											<i class="zmdi zmdi-map txt-danger"></i>
											<span class="block">map</span>
											</a>
										</li>
										<li>
											<a href="#" class="connection-item">
											<i class="zmdi zmdi-comment-outline txt-warning"></i>
											<span class="block">chat</span>
											</a>
										</li>
										<li>
											<a href="#" class="connection-item">
											<i class="zmdi zmdi-assignment-account"></i>
											<span class="block">contact</span>
											</a>
										</li>
									</ul>
								</div>	
							</li>
							<li>
								<div class="app-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> more </a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="img/user_prof.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="#"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							
							<li class="divider"></li>
							<li>
								<a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->

			<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="vendors/echarts-liquidfill.min.js"></script>
	<script src="dist/js/sweetalert-data.js"></script>
	<!-- Toast JavaScript -->
	<script src="../../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard-data.js"></script>
	<style type="text/css">
		@media screen and (max-width: 480px){
			#toggle_mobile_search{margin-top: 20px;}
			#toggle_mobile_nav{margin-top: 20px;}
		}
	</style>
</body>
</html>