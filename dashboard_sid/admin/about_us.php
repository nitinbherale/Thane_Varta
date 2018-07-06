<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

<div class="wrapper theme-1-active pimary-color-blue">

<?php include("header.php");
if(!isValidUser())   redirect("login.php"); ?>
<?php include("left_sidebar.php") ?>

<?php include("right_sidebar_backdrop.php") ?>
<!-- Main Content -->
<?php
if(isset($_POST['update'])) {
	$description = $_POST['description'];
	if(!strlen($description)>0) {
         	 echo '<script> my_function("Please Fill field"); </script>';
        }
        else
        {
        	$upd_qry="update about_content set content = '$description' where id = 1";
        	$run_qry=mysqli_query($dblink,$upd_qry);
        	if($run_qry){
        		echo '<script> success_message("","success","About Us information Updated Successfully","about_us.php"); </script>';
        	}
        	else{
        		 echo '<script> my_function("Sorry we are unable to process your request"); </script>';
        	}
        }
}
list($about_us) = exc_qry("select * from about_content");            
?>
	<div class="page-wrapper">
		<div class="container-fluid">
			
			<!-- Title -->
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark">About Us</h5>
				</div>						
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">Dashboard</a></li>
						<li class="active"><span>About Us</span></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			
			</div>
			<!-- /Title -->
			
			<!-- Row -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">About Us</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="form-wrap">
											<form method="post">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-lock"></i></div>
														<textarea id="myeditor" type="text" name="description"  class="form-control" ><?php echo $about_us[0]['content']; ?></textarea>
													</div>
												</div>
												<button type="submit" class="btn btn-success mr-10" name="update">Update</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->				
		</div>
		
		<!-- Footer -->
		<footer class="footer container-fluid pl-30 pr-30">
			<div class="row">
				<div class="col-sm-12">
					<p>2018 &copy; Thane Varta </p>
				</div>
			</div>
		</footer>
		<!-- /Footer -->
	
	</div>
			<!-- /Main Content -->
<script type="text/javascript">
// function toast_snackbar() {
// 		$.toast({
// 			//heading: 'Welcome to Siddhivinayak Trust Temple',
// 			text: 'You have made no changes to save',
// 			position: 'bottom-left',
// 			loaderBg:'#ffe4b8',
// 			icon: '',
// 			hideAfter: 3500, 
// 			stack: 6
// 		});
// 	}
// 	toast_snackbar();
</script>
<script type="text/javascript">

	CKEDITOR.replace('myeditor');

</script>
 </div><!--wrapper End-->
<script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>		
		<!-- Form Flie Upload Data JavaScript -->
<script src="dist/js/form-file-upload-data.js"></script>
<style type="text/css">
	.img-wd-200{width: 200px;}
	.butn{border: none;background: transparent;}
	.jq-toast-wrap .jq-toast-single {
    
    background:#0074d985;
}
</style>

