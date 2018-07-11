 <link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

 <div class="wrapper theme-1-active pimary-color-blue">

<?php include("header.php");  
if(!isValidUser())   redirect("login.php"); ?>
<?php include("left_sidebar.php"); ?>
<?php include("right_sidebar_backdrop.php"); 

	//delete image
	if (isset($_POST['delete']))
	{
		
		$id = $_POST['id'];
			$del_qry = "update advertise set status = 1 where id = $id";
    	$del_res = mysqli_query($dblink,$del_qry);
    	if($del_res){
    		 echo '<script> success_message("Success","success","advertise deleted successfully","advertisement.php"); </script>';
    	}
    	else{
		     echo '<script> my_function("Error in delete advertisement"); </script>';
		    }	
	}
	//delete image

	if(isset($_POST['edit']))
	{
		$id = $_POST['id'];
		list($add) = exc_qry("select * from advertise where id = $id");
		$advertise = $add[0]['advertise'];
		$img = $add[0]['img'];
		//echo '<script> my_function("'.$img.'"); </script>';
	}
	
	

	//insert image
	if(isset($_POST['add'])){
		if((strlen($_POST['advertise'])>0) || (strlen($_FILES['img']['name'])>0) ){
			$go = 1;
			$qry = "";
			$advertise = mysqli_real_escape_string($dblink,$_POST['advertise']); 
			$img = $_FILES['img'];
			$imgpath = "../../img/banner/"; 
			$tmp = strtolower(time()."_".$_FILES['img']['name']);
			if(strlen($img['name'])>0){
				if(!move_uploaded_file($img["tmp_name"],$imgpath.$tmp))//storing image in file
	            {
	                echo '<script> my_function("Image Upload Failed"); </script>';
	        		$go = 0;
	            }
	            else{
	            	$qry .= ", img  = '$tmp'";
	            }
	        }

			if($go==1){
		    	$ins_qry = "insert into advertise set advertise = '$advertise' ".$qry;
		    	$ins_res = mysqli_query($dblink,$ins_qry);
		    	if($ins_res){
		    		 echo '<script> success_message("","success","advertise added successfully","advertisement.php"); </script>';
		    	}
		    	else{
		    		$msg = mysqli_error($dblink);
				     echo '<script> my_function("Error in insert category"); </script>';
				    }
			}
		}
		else{
			echo '<script> my_function("Please Fill the data or select image"); </script>';
		}
	}
	//insert image
	if(isset($_POST['update'])){
		
		$id = mysqli_real_escape_string($dblink,$_POST['id']);
			if((strlen($_POST['advertise'])>0) || (strlen($_FILES['img']['name'])>0) ){
			$go = 1;
			$qry = "";
			$advertise = mysqli_real_escape_string($dblink,$_POST['advertise']); 
			$img = $_FILES['img'];
			$imgpath = "../../img/banner/"; 
			$tmp = strtolower(time()."_".$_FILES['img']['name']);
			if(strlen($img['name'])>0){
				if(!move_uploaded_file($img["tmp_name"],$imgpath.$tmp))//storing image in file
	            {
	                echo '<script> my_function("Image Upload Failed"); </script>';
	        		$go = 0;
	            }
	            else{
	            	$qry .= ", img  = '$tmp'";
	            }
	        }

			if($go==1){
		    	$ins_qry = "update advertise set advertise = '$advertise' ".$qry." where id = $id";
		    	$ins_res = mysqli_query($dblink,$ins_qry);
		    	if($ins_res){
		    		 echo '<script> success_message("","success","advertise updated successfully","advertisement.php"); </script>';
		    	}
		    	else{
		    		$msg = mysqli_error($dblink);
				     echo '<script> my_function("Error in insert category"); </script>';
				    }
			}
		}
		else{
			echo '<script> my_function("Please Fill the data or select image"); </script>';
		}	
	   		
		}
		if($id>0)
	{
		list($add) = exc_qry("select * from advertise where id = $id");
		$advertise = $add[0]['advertise'];
		$img = $add[0]['img'];
		//echo '<script> my_function("'.$img.'"); </script>';
	}
?>

<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Advertisement</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.php">Dashboard</a></li>
								<li class="active"><span>Advertisement</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Advertisement </h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form method="post" enctype="multipart/form-data">
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputuname_1">Advertisement Code *</label>
															<input type="hidden" name="id" id="input1" value="<?php echo $id; ?>">
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-user"></i></div>
																<textarea class="form-control" id="advertise" placeholder="Put code here" name="advertise" ><?php echo $advertise; ?></textarea>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_1">Advertisement Image *</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																<input type="file" name="img" accept="image/jpg,image/jpeg"  id="input-file-max-fs" data-default-file="../../img/banner/<?php echo $img; ?>" class="dropify"  data-max-file-size="2M" />
															</div>
														</div>
														
														<?php if($id>0){?>
														<button class="btn  btn-success ml-10" type="submit" name="update">Update</button>
														<button class="btn  btn-danger ml-10" type="button" onclick="window.location='category.php'">Cancel</button>	
														<?php } else { ?>
														<button class="btn  btn-success ml-10" type="submit" name="add">Add</button>
														<?php } ?>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row -->
					<!-- Table start -->
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
															<th>Advertisement</th>
															<th>Actions</th>
														</tr>
													</thead>
													
													<tbody>
														 <?php								
	                                                     $select_qry = "SELECT * FROM advertise where status = 0 order by id desc";

	                                                     $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
	                                                     	$a=1;
	                                                      while ($row = mysqli_fetch_assoc($result)) { ?>         
													   	<tr>
														  <td><?php echo $a; ?></td>
														  <td> <?php if(strlen($row['advertise'])>0){
														   echo $row['advertise']; } else { ?>
														   	<img src="../../img/banner/<?php echo $row['img']; ?>" class="img img-wd-200">
														   <?php } ?>
														   </td>
														  </td>
														  <td class="text-nowrap">
														  	<ul class="oneline">
															<li>
														    <form method="post">
														    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
															  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Edit" name="edit"> <i class="fa fa-pencil-alt text-inverse m-r-20"></i> </button>
	                                                        </form>
	                                                         </li>
	                                                         <li>
	                                                        <form method="post">
	                                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
															  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Delete" name="delete" onclick="return confirm('Are you sure that you want to delete advertisement?');"
																> <i class="fa fa-trash text-danger m-r-20"></i> </button>
															</form>
															</li>
															</ul> 	
														  </td>
														</tr>
														<?php $a++; } ?>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<!-- /Table end -->

			
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
<script type="text/javascript">
	CKEDITOR.replace('advertise');
</script>
<script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>		
		<!-- Form Flie Upload Data JavaScript -->
<script src="dist/js/form-file-upload-data.js"></script>
<style type="text/css">
	.card-view{
	padding: 15px 15px 15px;
	}
	.butn{
		border: none;
		background: transparent;
	}
	.img-wd-200{
		height: 150px;}
	.oneline
{
  display:flex;  
  list-style:none;
}
td ul{
  display:flex;  
  list-style:none;
}
thead{background:#f05737;}
 .table > thead > tr > th {color: #fff;font-weight: 600;font-size: 14px;}
</style>
