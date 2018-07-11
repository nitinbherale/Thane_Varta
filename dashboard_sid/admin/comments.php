<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<link href="../../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
							<h5 class="txt-dark">Comments</h5>
						</div>

						<?php
                          

                          if(isset($_POST["approve"]))
							{
							    $id = $_POST['id'];
							    $status=1;
							    $query = "update comments set status = '".$status."'where id = '".$id."'"; 
							    if(mysqli_query($dblink,$query))
							    {
								    echo '<script> success_message("Success","success","Comment Approved Succesfully","comments.php");  </script>';
							    }
								else
							    {
							    	$msg ="Error:".mysqli_error($dblink);
							    	echo '<script> my_function("Sorry we are unable to proceed your request");  </script>';

							    }
							}
							if(isset($_POST["disapprove"]))
							{
							    $id = $_POST['id'];
							    $status=2;
							    $query = "update comments set status = '".$status."'where id = '".$id."'"; 
							    if(mysqli_query($dblink,$query))
							    {
								    echo '<script> success_message("Success","success","Comment Dispproved Succesfully","comments.php");  </script>';
							    }
								else
							    {
							    	$msg ="Error:".mysqli_error($dblink);
							    	echo '<script> my_function("Sorry we are unable to proceed your request");  </script>';

							    }
							}
						if(isset($_POST["submit"]))
							{
							    $select = $_POST['select'];
							    $Chk_box = $_POST["chk_box"]; // print_r($Chk_box);
							    $array = $Chk_box[0];
							   	for($i=1;$i<count($Chk_box);$i++)
    								{
    									$array .= ",".$Chk_box[$i];
    								}
    								if (count($Chk_box)==0)
								    {
								        echo '<script> my_function("Please select Comments");  </script>';
								    }
								    else{
								    	$upd_query = "update comments set status = $select WHERE id in (".$array.")";
								    	//echo '<script> my_function("'.$upd_query.'");  </script>';
								    	//break;
					        				$run_query = mysqli_query($dblink,$upd_query);
					        				 if ($run_query) {
					        				 	if($select==1){
									        	echo '<script> success_message("Success","success","Comments Approved Succesfully","comments.php");  </script>';
									        	}
									        	else
									        	{
									        		echo '<script> success_message("Success","success","Comments Dispproved Succesfully","comments.php");  </script>';
									        	}
									        }
									        else{
									        	$msg = mysqli_error($dblink);
													echo '<script> my_function("Sorry we are unable to proceed your request");  </script>';
									        }
								    }
							    //echo '<script> my_function("'.$array.$select.'");  </script>';

							}                      
                        ?>
						
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.php">Dashboard</a></li>
								<li class="active"><span>Comments</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					<!-- /Row -->	
							
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<button class="btn btn-primary" onclick="window.location='all_comments.php'">View All 
										 <i class="fa fa-eye"></i>
								</button>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<form id="form_set" class="row" method="post">
											<div class="col-md-3 col-sm-12 col-xs-12 form-group">
													<select class="form-control" name="select">
														<option value="1">Approve</option>
														<option value="2">Disapprove</option>
													</select>
											</div>
											<button type="submit" class="btn btn-success mr-10 ml-10" name="submit">Submit</button>
										</form>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="datable_1" class="table table-hover table-bordered display  pb-30" >

													<thead>
														
														<tr>
															<th>Id</th>
															<th>Name</th>
															<th>Comment</th>
															<th>Email ID</th>
															<th>News</th>
															<th>Date</th>
															<th>Actions</th>
														</tr>
													</thead>
													
													<tbody>

														 <?php														

	                                                     $select_qry = "SELECT * FROM comments where status = 0 order by id desc";

	                                                     $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
	                                                     	$a=1;
	                                                      while ($row = mysqli_fetch_assoc($result)) { ?>
	                                                       
													   <tr>
														  <td>
														  	<?php echo $a; ?>
														  	<input form="form_set" type="checkbox" value="<?php echo $row["id"];?>" name="chk_box[]" />
														  </td>
														  <td> <?php echo $row['author']; ?></td>
														   <td> <?php echo $row['content']; ?></td>
														   <td> <?php echo $row['email']; ?></td>
														  <td><?php 
								                         $news_id=$row['news_id'];
                       									echo $get_heading=GetNews($news_id);
								                            ?></td>
														  <td><?php echo $row['date']; ?></td>
														  <td class="text-nowrap">
														    <ul>
														    	<li>
															    <form method="post">
																    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																	  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Approve" name="approve"> <i class="fa fa-thumbs-up text-success m-r-10"></i> </button>
		                                                        </form>
		                                                         </li>
		                                                         <li> 	
		                                                        <form method="post">
		                                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Disapprove" name="disapprove" onclick="return confirm('Are you sure that you want to disapprove this comment?');" > <i class="fa fa-thumbs-down text-danger"></i> </button>
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
<script src="../../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>		
		<!-- Form Flie Upload Data JavaScript -->
<script src="dist/js/form-file-upload-data.js"></script>

<style type="text/css">
	.img-wd-200{width: 150px;}
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
