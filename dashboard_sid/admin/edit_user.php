<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<div class="wrapper theme-1-active pimary-color-blue">

<?php include("header.php");
if(!isValidUser())   redirect("login.php"); ?>
<?php include("left_sidebar.php") ?>

<?php include("right_sidebar_backdrop.php") ?>
<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">User</h5>
						</div>

						<?php

                          if (isset($_POST['edit_user'])) {
                         	 $id = $_POST['id'];
                         	 $go = 1;
	                         $fname = mysqli_real_escape_string($dblink,$_POST['fname']);
	                         $email =  mysqli_real_escape_string($dblink,$_POST['email']);
	                         $img = $_FILES['img']; //image
                             $tmp_name = strtolower(time()."_".$img['name']);
                             $imgpath = "../../images/user/";
	                         $qry = "";
	                         //echo $title.$tmp_name.$date.$duration.$address.$description;
                         	//echo '<script> my_function("Error"); time_out(); </script>';
	                         if(strlen($img['name'])>0){
		                        if(!move_uploaded_file($img["tmp_name"],$imgpath.$tmp_name))//storing image in file
	                            {
	                             	echo '<script> my_function("File Upload File"); </script>';
	            					$go = 0;
	                            }
	                            else{
	                            	$qry = ",image = '$tmp_name'";
	                            }
                           	}
                             if($go==1){
			                       $upd_query = "update admin set f_name = '$fname', email = '$email' ".$qry." where id = $id";
			                           $run_query = mysqli_query($dblink,$upd_query);
			                         if ($run_query) {
			                         	echo '<script> success_message("Success","success","User updated Successfully","user.php"); </script>';
			                         }
			                         else{
			                         	$msg = mysqli_error($dblink);
			                         	echo '<script> my_function("Error in edit");</script>';
			                         }
	                     		}
                         }
                         	
                         	$id = $_POST['id'];
                         	list($user) = exc_qry("select * from admin where id = $id");
                         	if(count($user)>0){
                         	$fname = $user[0]['f_name']; 
                         	$email = $user[0]['email'] ;
                         	$img = $user[0]['image'];  
                         	} 
                         	else{
                         		header('location:user.php');
                         	}                    
                        ?>
						
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.php">Dashboard</a></li>
								<li class="active"><span>User</span></li>
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
										<h6 class="panel-title txt-dark">User</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form method="post"  enctype="multipart/form-data">
														<input type="hidden" name="id"  value="<?php echo($id); ?>">
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Full Name *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1"  name="fname" value="<?php echo $fname; ?>"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Email *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="email" class="form-control" id="exampleInputuname_1"  name="email" value="<?php echo $email; ?>"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Image *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																<input type="file"  name="img" accept="image/gif, image/jpg, image/jpeg, image/png"  id="input-file-max-fs" class="dropify"  data-max-file-size="2M"  data-default-file="../../images/user/<?php echo $img; ?>" />
															</div>
														</div>

														<button type="submit" class="btn btn-success mr-10" name="edit_user">Edit</button>
														<button type="button" class="btn btn-default mr-10" onclick="window.location='user.php'">Cancel</button>
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
							<p>2018 &copy; Shree Siddhivinayak Trust Temple</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
			
			</div>
			<!-- /Main Content -->
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
td ul{
  display:flex;  
  list-style:none;
}
thead{background:#f05737;}
 .table > thead > tr > th {color: #fff;font-weight: 600;font-size: 14px;}
</style>
