<div class="wrapper theme-1-active pimary-color-blue">
	<?php include("header.php");
 if(!isValidUser())   redirect("login.php");  ?>
<?php include("left_sidebar.php") ?>

<?php include("right_sidebar_backdrop.php") ?>
<?php
	
    //add                    
  	if (isset($_POST['add'])) {
	     $title = mysqli_real_escape_string($dblink,$_POST['title']);
	     $icon = mysqli_real_escape_string($dblink,$_POST['icon']);
	     $link = mysqli_real_escape_string($dblink,$_POST['link']);
	   	$insert_query = "INSERT INTO social_media (title, icon, link)
	           VALUES ('$title', '$icon', '$link')";
	       $run_query = mysqli_query($dblink,$insert_query);
	     if ($run_query) {
	     	echo '<script> success_message("Success","success","Link Added Successfully","social_media.php"); </script>';
	    }
	     else{
	     	echo '<script> my_function("Error");</script>';
	    }
  	}

  //fetch data for edit
  	if (isset($_POST['edit'])) {
	 	$id = $_POST['id'];
	 	list($social) = exc_qry("select * from social_media where id = $id");
	 	$title = $social[0]['title'];
	 	$icon = $social[0]['icon'];
	 	$link = $social[0]['link'];
 	}
 	
	if (isset($_POST['delete'])) {
	  	$id = $_POST['id'];
	  	 $del_query = "update social_media set status = 1 WHERE id = '$id' ";
	    $run_query = mysqli_query($dblink,$del_query);
	    if ($run_query) {
	    	echo '<script> success_message("Success","success","Link Deleted","social_media.php"); </script>';
	    }
	    else{
	    	$msg = mysqli_error($dblink);
				echo '<script> my_function("Error");</script>';
	    }
  	}


    if (isset($_POST['edit_link'])) {
     	$id = $_POST['id'];
     	 $title = mysqli_real_escape_string($dblink,$_POST['title']);
	     $icon = mysqli_real_escape_string($dblink,$_POST['icon']);
	     $link = mysqli_real_escape_string($dblink,$_POST['link']);

        $upd_query = "update social_media set title = '$title', icon = '$icon', link = '$link' where id = $id";
        $run_query = mysqli_query($dblink,$upd_query);
	    if ($run_query) {
	     	echo '<script> success_message("Success","success","Link updated Successfully","social_media.php");</script>';
	    }
	    else{
	     	$msg = mysqli_error($dblink);
	     	echo '<script> my_function("Error");</script>';
	    }	
    }

    $Days = array('Angarki Chaturthi','Sankashti Chaturthi','Vinayaki Chaturthi');

     ?>
					



<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Social Media</h5>
			</div>

			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li>
					<li class="active"><span>Social Media</span></li>
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
							<h6 class="panel-title txt-dark">Social Media Links</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form method="post" >	
											<div class="form-group">
												<input type="hidden" name="id"  value="<?php echo($id); ?>">
												<label class="control-label mb-10" for="exampleInputuname_1">title *</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input type="text" class="form-control" id="input2" placeholder="Title" name="title"  required  value="<?php echo $title; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label mb-10" for="exampleInputuname_1">Icon *</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input type="text" class="form-control" id="input2" placeholder="Icon" name="icon" required  value="<?php echo $icon; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label mb-10" for="exampleInputuname_1">Link *</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input type="url" class="form-control" id="input2" placeholder="Link" name="link"  required  value="<?php echo $link; ?>">
												</div>
											</div>
											<?php if($id > 0) {?>
											<button type="submit" class="btn btn-success mr-10" name="edit_link">Edit</button>
											<button type="button" class="btn btn-default mr-10" onclick="window.location='social_media.php'">Cancel</button>
											<?php } else { ?>
											<button type="submit" class="btn btn-success mr-10" name="add">Add</button>
											<?php  } ?>
										</form>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Row-->
		<!--table-->
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
												<th>Title</th>
												<th>Icon</th>
												<th>Link</th>
												<th>Actions</th>
											</tr>
										</thead>
										
										<tbody>
											 <?php														

                                             $select_qry = "SELECT * FROM social_media where status = 0 order by id desc";

                                             $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
                                             	$a=1;
                                              while ($row = mysqli_fetch_assoc($result)) { ?>
                                                
										   <tr>
											  <td><?php echo $a; ?></td>
											  <td> <?php echo $row['title']; ?></td>
											  <td><?php echo $row['icon']; ?> </td>
											  <td><?php echo $row['link']; ?> </td>
											  <td class="text-nowrap">
											    <ul>
											    	
											    	<li>
												    <form method="post">
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
		<!-- /Table -->	
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
<style type="text/css">
	.butn{border: none;background: transparent;}
td ul{
  display:flex;  
  list-style:none;
}
thead{background:#f05737;}
 .table > thead > tr > th {color: #fff;font-weight: 600;font-size: 14px;}
</style>
