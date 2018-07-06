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

                         
                          if (isset($_POST['add'])) {
                          	 $go = 1;
	                         $fname = mysqli_real_escape_string($dblink,$_POST['fname']);
	                         $uname = mysqli_real_escape_string($dblink,$_POST['uname']);
	                         $pass =  mysqli_real_escape_string($dblink,$_POST['password']);
	                         $con_pass =  mysqli_real_escape_string($dblink,$_POST['con_password']);
	                         $email =  mysqli_real_escape_string($dblink,$_POST['email']);
	                         $img = $_FILES['img']; //image
                             $tmp_name = strtolower(time()."_".$img['name']);
                             $imgpath = "../../images/user/";
                             list($chk_username) = exc_qry("select * from admin where username = '$uname'");
                             if(count($chk_username)>0){
                             	echo '<script>my_function("Username is taken Please select other username"); </script>';
            					$go = 0;
                             }
                             elseif($pass!=$con_pass){
                             	echo '<script>my_function("Confirm Password did not match!"); </script>';
            					$go = 0;
                             }
	                         elseif(!move_uploaded_file($img["tmp_name"],$imgpath.$tmp_name))//storing image in file
                             {
                             	echo '<script> my_function("Image Upload File"); </script>';
            					$go = 0;
                             
                             }
                             $pass = md5($pass);
                             if($go==1){
			                       $insert_query = "INSERT INTO  admin (f_name,username,email,password,image)
		                                   VALUES ( '$fname','$uname','$email','$pass','$tmp_name')";
			                           $run_query = mysqli_query($dblink,$insert_query);
			                         if ($run_query) {
			                         	echo '<script> success_message("Success","success","User Added Successfully","user.php");  </script>';
			                         }
			                         else{
			                         	echo '<script> my_function("Error"); </script>';
			                         }
	                     		}

                          }

                          if (isset($_POST['delete'])) {
                          	 $id = $_POST['id'];
                          	 $del_query = "update admin set status = 1 WHERE id = '$id' ";

					        $run_query = mysqli_query($dblink,$del_query);

					        if ($run_query) {
					        	echo '<script> success_message("Success","success","User Deleted","user.php");  </script>';
					        }
					        else{
					        	$msg = mysqli_error($dblink);
									echo '<script> my_function("Error");  </script>';
					        }
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
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Full Name *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1"  name="fname" value="<?php echo $fname; ?>"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">username *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1"  name="uname" value="<?php echo $uname; ?>"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Password *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="password" class="form-control" id="exampleInputuname_1" minlength="6"  name="password" value="<?php echo $password; ?>"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Confirm Password *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="password" class="form-control" id="exampleInputuname_1" minlength="6"  name="con_password" value="<?php echo $con_password; ?>"  required>
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
																<input type="file"  name="img" accept="image/gif, image/jpg, image/jpeg, image/png"  id="input-file-max-fs" class="dropify"  data-max-file-size="2M"  data-default-file="../../images/user/<?php echo $img; ?>" required />
															</div>
														</div>
														
													
														<button type="submit" class="btn btn-success mr-10" name="add">Add</button>
														
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
							
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">

								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover table-bordered display  pb-30" >
													<thead>
														<tr>
															<th>Id</th>
															<th>Name</th>
															<th>Username</th>
															<th>Email</th>
															<th>Image</th>
															<th>Actions</th>
														</tr>
													</thead>
													
													<tbody>
														 <?php														

	                                                     $select_qry = "SELECT * FROM tv_admin where status = 0 order by id desc";

	                                                     $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
	                                                     	$id=1;
	                                                      while ($row = mysqli_fetch_assoc($result)) { ?>
	                                                        
													   <tr>
														  <td><?php echo $id; ?></td>
														  <td> <?php echo $row['f_name']; ?></td>
														   <td> <?php echo $row['username']; ?></td>
														    <td> <?php echo $row['email']; ?></td>

														  <td><img src="../../images/user/<?php echo $row['image']; ?>" class="img img-wd-200"> </td>
														  <td class="text-nowrap">
														    <ul>
														    	<li>
															    <form method="post" action="edit_user.php">
																    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																	  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Edit" name="edit"> <i class="fa fa-pencil-alt text-inverse m-r-10"></i> </button>
		                                                        </form>
		                                                         </li>
		                                                         <li> 	
		                                                        <form method="post">
		                                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Delete" name="delete"> <i class="fa fa-trash text-danger"></i> </button>
																</form>
																</li>
																<li>
															    <form method="post" action="cng_pass.php">
																    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																	  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Change Password" name="Change Password"> <i class="fa fa-unlock text-inverse m-r-10"></i> </button>
		                                                        </form>
		                                                         </li>
															</ul>
														  </td>
														</tr>
														<?php $id++; } ?>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>				
				
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
<script>
function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#person').bind('keypress', testInput);
</script>
