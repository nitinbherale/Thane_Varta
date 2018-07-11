 <div class="wrapper theme-1-active pimary-color-blue">
<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<?php  include("header.php");
if(!isValidUser())   redirect("login.php"); ?>
<?php include("left_sidebar.php") ?>
<?php include("right_sidebar_backdrop.php") ?>
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
			                         	echo '<script> success_message("Success","success","User details updated Successfully","index.php"); </script>';
			                         }
			                         else{
			                         	$msg = mysqli_error($dblink);
			                         	echo '<script> my_function("Error in edit");</script>';
			                         }
	                     		}
                         }
?>

<!--wrapper End-->
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
					<div class="panel card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body row pa-0">
								<div class="sm-data-box">
									<div class="container-fluid">
										<?php list($imp_dates)=exc_qry("select * from imp_dates where status = 0 and date > '".date('Y-m-d')."' order by date limit 4");  
										//echo count($imp_dates); 
										?>
										<div class="row">
											<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												<span class="weight-500  txt-dark block">Important Dates</span>
												<?php for ($i=0; $i < count($imp_dates); $i++) { ?>
													<br>
												<span class="block inline-block txt-dark"><strong><?php echo $imp_dates[$i]['date'];  ?></strong></span>

												<?php } ?>
												
											</div>
											<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
												<span class="weight-500 txt-dark block">Day</span>
												<?php for ($i=0; $i < count($imp_dates); $i++) { ?>
													<br>
												<span class="block inline-block txt-dark"><strong><?php echo $imp_dates[$i]['title'];  ?></strong></span>
												<?php } ?>
											</div>
										</div>	

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Details</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body row">
								<div class="">
									<div class="pl-15 pr-15 mb-15">
										<div class="pull-left">
											<i class="fa fa-comment inline-block mr-10 font-16"></i>
											<span class="inline-block txt-dark">Pending Comments</span>
										</div>	
											<span class="inline-block txt-warning pull-right weight-500">
												<?php list($pending_comments)=exc_qry("select * from comments where status = 0");  
												echo count($pending_comments); 
												?>
											</span>
											<div class="clearfix"></div>
									</div>
										<hr class="light-grey-hr mt-0 mb-15">
									<div class="pl-15 pr-15 mb-15">
										<div class="pull-left">
											<i class="fa fa-file inline-block mr-10 font-16"></i>
											<span class="inline-block txt-dark">News</span>
										</div>	
										<span class="inline-block txt-danger pull-right weight-500">
											<?php list($news)=exc_qry("select * from news where status = 0 ");  
												echo count($news); 
												?>	
										</span>
										<div class="clearfix"></div>
									</div>
										<hr class="light-grey-hr mt-0 mb-15">
									<div class="pl-15 pr-15 mb-15">
										<div class="pull-left">
											<i class="fa fa-comments inline-block mr-10 font-16"></i>
											<span class="inline-block txt-dark">Comments</span>
										</div>	
										<span class="inline-block txt-primary pull-right weight-500">
											<?php list($comments)=exc_qry("select * from comments where status = 1 ");  
												echo count($comments); 
												?>
										</span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php list($user) = exc_qry('select * from admin where id = '.$_SESSION['user_id'].'');?>
				<div class="col-lg-4 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="../../images/user/<?php echo $user[0]['image']; ?>" alt="user">
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-primary"><?php echo $user[0]['f_name']; ?></h5>
											<h6 class="block capitalize-font pb-20"><?php echo $user[0]['username']; ?></h6>
										</div>	
										<div class="social-info">
											<button class="btn btn-primary btn-block btn-rounded  btn-anim " data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
					<div class="panel card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body row pa-10">
								<div class="sm-data-box">
									<div class="container-fluid">
										<?php list($imp_dates)=exc_qry("select * from imp_dates where status = 0 and date > '".date('Y-m-d')."' order by date limit 5");  
										//echo count($imp_dates); 
										?>
											<div class="img_day row">
								           <?php 
				                            list($image_of_day) = exc_qry("select * from image_day where date = '".date('Y-m-d')."'");
				                            $src = $image_of_day[0]['image'];
									    if(!strlen($src)>0){
									 	$src = "noimage.jpeg";
									    }
									 	?>
								           <figure><img src="../../images/image_of_day/<?php echo $src; ?>" class="img-responsive img " width="100%" ></figure>
								       </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- 	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
					<div class="panel card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body row pa-0">
								<div class="sm-data-box">
									<div class="container-fluid">
									   
								       <div class="img_day row">
								           <?php 
				                            list($image_of_day) = exc_qry("select * from image_day where date = '".date('Y-m-d')."'");
				                            $src = $image_of_day[0]['image'];
									    if(!strlen($src)>0){
									 	$src = "noimage.jpeg";
									    }
									 	?>
								           <figure><img src="../../images/image_of_day/<?php echo $src; ?>" class="img-responsive img img-thumbnail" width="100%" ></figure>
								       </div>
								    </div>
								</div>
						    </div>
						</div>
					</div>
				</div> -->


			</div>
		</div>
	</div>
</div>
<style type="text/css">
	
	 .img_day figure {
	width: auto;
	height: auto;
	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
    .img_day figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.img_day figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);

}
</style>
<!--modal starts-->
<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
			</div>
			<div class="modal-body">
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="col-sm-12 col-xs-12">
										<div class="form-wrap">
											<form method="post" enctype="multipart/form-data">
												<div class="form-body overflow-hide">
													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
														<input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
														<div class="input-group">
															<div class="input-group-addon"><i class="icon-user"></i></div>
															<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Enter Your Name" value="<?php echo $user[0]['f_name']; ?>" required name = 'fname'>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_1">Image *</label>
														<div class="input-group">
															<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
															<input type="file"  name="img" accept="image/jpg, image/jpeg, image/png"  id="input-file-max-fs" class="dropify"  data-max-file-size="2M"  data-default-file="../../images/user/<?php echo $user[0]['image']; ?>" />
														</div>
													</div>
													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
														<div class="input-group">
															<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
															<input type="email" class="form-control" id="exampleInputEmail_1" placeholder="Enter Your Name" name="email" value="<?php echo $user[0]['email']; ?>" required>
														</div>
													</div>
												</div>
												<div class="form-actions mt-10">			
													<button type="submit" name="edit_user" class="btn btn-primary mr-10 mb-30">Update profile</button>
												</div>				
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--modal close-->
<script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>		
		<!-- Form Flie Upload Data JavaScript -->
<script src="dist/js/form-file-upload-data.js"></script>