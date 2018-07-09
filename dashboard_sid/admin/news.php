<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<div class="wrapper theme-1-active pimary-color-blue">

<?php include("header.php"); if(!isValidUser())   redirect("login.php");  ?>
<?php include("left_sidebar.php") ?>

<?php include("right_sidebar_backdrop.php") ?>
<?php
  if (isset($_POST['add'])) {

     $trustee_name = mysqli_real_escape_string($dblink,$_POST['trustee_name']);
     $seniority = mysqli_real_escape_string($dblink,$_POST['seniority']);
     $role = mysqli_real_escape_string($dblink,$_POST['role']);
     $img = $_FILES['trustee_img']; //image
     $tmp_name = strtolower(time()."_".$img['name']);
     $imgpath = "../../images/trustees/";
     $go = 1;

   

     if(!move_uploaded_file($img["tmp_name"],$imgpath.$tmp_name))//storing image in file
     {
         echo '<script> my_function("File Upload File"); </script>';
			$go = 0;
        }
    if($go==1){
   		$insert_query = "INSERT INTO trustees (trustee_name, trustee_work, trustee_image ,seniority)
           VALUES ('$trustee_name', '$role', '$tmp_name' ,$seniority)";
       	$run_query = mysqli_query($dblink,$insert_query);

        if ($run_query) {
        	echo '<script> success_message("Success","success","Added Successfully","trustees.php"); </script>';
        }
        else{
        	echo '<script> my_function("Error"); </script>';
        }
        }

  }
  if (isset($_POST['delete'])) {
                       
       $id = $_POST['id'];

    $del_query = "update trustees set status = 1 WHERE trustee_id = '$id' ";

    $run_query = mysqli_query($dblink,$del_query);

    if ($run_query) {
    	//echo "<script>alert('".$del_query."');</script>";
    	echo '<script> success_message("Success","success","Deleted","trustees.php"); </script>';
    }
    else{
    	$msg = mysqli_error($dblink);
			echo '<script> my_function("Error"); </script>';
    }
  }

?>
					
<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">News</h5>
						</div>

						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.php">Dashboard</a></li>
								<li class="active"><span>News</span></li>
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
										<h6 class="panel-title txt-dark">News</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form method="post" action="" enctype="multipart/form-data">
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Title *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Heading of news" name="trustee_name" required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Description *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<textarea type="text" class="form-control" id="exampleInputuname_1" rows="5" placeholder="Description of news" name="trustee_name" required></textarea> 
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">News Image *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																<input type="file"  name="img" accept="image/gif, image/jpg, image/jpeg, image/png"  id="input-file-max-fs" class="dropify"  data-max-file-size="2M"  data-default-file="../../images/stories/<?php echo $img; ?>" <?php if($id>0){} else{echo "required";} ?> />
															</div>
														</div>
														
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Author *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Author of news" name="trustee_name" required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">News Tags *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1" placeholder="News Tags" name="trustee_name" required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Meta Keywords *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Meta Keywords" name="trustee_name" required>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Meta Description *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<textarea type="text" class="form-control" id="exampleInputuname_1" rows="5" placeholder="Meta Description" name="trustee_name" required></textarea> 
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputpwd_1"> Category</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-lock"></i></div>
																<select class="form-control">
																	<option>Demo</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputpwd_1"> Sub Category</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-lock"></i></div>
																<select class="form-control">
																	<option>Demo</option>
																</select>
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

				<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
				<script type="text/javascript">
	                 CKEDITOR.replace('myeditor');
                 </script>
			
			</div>
			<!-- /Main Content -->

 </div><!--wrapper End-->
	<script src="dist/js/dataTables-data.js"></script>	
 <script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>		
		<!-- Form Flie Upload Data JavaScript -->
<script src="dist/js/form-file-upload-data.js"></script>
<style type="text/css">
	input[type='number'] {
    -moz-appearance:textfield;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
thead{background:#f05737;}
 .table > thead > tr > th{color: #fff;font-weight: 600;font-size: 14px;}
 .butn {background-color: transparent;border: none;}
 
 .oneline
{
  display:flex;  
  list-style:none;
}
</style>
