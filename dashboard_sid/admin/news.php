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
							<h5 class="txt-dark">News</h5>
						</div>

						<?php
                          if (isset($_POST['delete'])) {
                          	 $id = $_POST['id'];
                          	 $del_query = "update news set status = 1 WHERE id = '$id' ";

					        $run_query = mysqli_query($dblink,$del_query);

					        if ($run_query) {
					        	echo '<script> success_message("Success","success","News Deleted Succesfully","news.php");  </script>';
					        }
					        else{
					        	$msg = mysqli_error($dblink);
									echo '<script> my_function("Error in news delete");  </script>';
					        }
                          }

                          if(isset($_POST["set_top"]))
							{
							    $Chk_box = $_POST["chk_box"]; // print_r($Chk_box);
							    $msg = Set_Top($Chk_box,'news');
							    if($msg=="Please select data "){
							    	echo '<script> my_function("Please select news");  </script>';
							    }
							    elseif($msg=="Success"){
							    	echo '<script> success_message("Success","success","Request Completed","news.php");  </script>';
							    }
							   // list($TtlPg,$Pg,$resultArray,$Ttl)=listdata($Pg,$tblname);  
							    //redirect("news.php");
							}
							if (isset($_POST['delete_selected'])) {
								$Chk_box = $_POST["chk_box"];
								$array = $Chk_box[0];
								if (count($Chk_box)==0)
								    {
								        echo '<script> my_function("Please select news");  </script>';
								    }
								    else{
								    		for($i=1;$i<count($Chk_box);$i++)
            								{
            									$array .= ",".$Chk_box[$i];
            								}
								    		$del_query = "update news set status = 1 WHERE id in (".$array.")";
								    		//echo '<script> my_function("'.$del_query.'");  </script>';
					        				$run_query = mysqli_query($dblink,$del_query);
					        				 if ($run_query) {
									        	echo '<script> success_message("Success","success","News Deleted Succesfully","news.php");  </script>';
									        }
									        else{
									        	$msg = mysqli_error($dblink);
													echo '<script> my_function("Error in news delete");  </script>';
									        }
								    }
							}                       
                        ?>
						
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
					<!-- /Row -->	
							
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<button class="btn btn-success" onclick="window.location='add_news.php'">Add News + </button>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<form id="form_set" method="post">
											<button type="submit" class="btn btn-success mr-10" name="set_top">Set Top</button>
											<button type="submit" class="btn btn-danger mr-10" name="delete_selected">Delete Selected</button>
										</form>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="datable_1" class="table table-hover table-bordered display  pb-30" >

													<thead>
														
														<tr>
															<th>Id</th>
															<th>Title</th>
															<th>Description</th>
															<th>Author</th>
															<th>Image</th>
															<th>Category</th>
															<th>Post Date</th>
															<th>Actions</th>
														</tr>
													</thead>
													
													<tbody>

														 <?php														

	                                                     $select_qry = "SELECT * FROM news where status = 0 order by id desc";

	                                                     $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
	                                                     	$id=1;
	                                                      while ($row = mysqli_fetch_assoc($result)) { ?>
	                                                       
													   <tr>
														  <td>
														  	<?php $top = $row["top"]; if($top==1){echo ' <span class="fa fa-chevron-up" style="background-color:#3485dc;color:white;border-radius:50%;padding:5px;margin-bottom:5px"></span>';}?>
														  	<?php echo $id; ?>
														  	<input form="form_set" type="checkbox" value="<?php echo $row["id"];?>" name="chk_box[]" />
														  </td>
														  <td> <?php echo $row['heading']; ?></td>
														   <td> <?php $description = substr($row['content'],0,100);
														   if(substr($description, 0, strrpos($description, ' '))!='') $description = substr($description, 0, strrpos($description, ' ')); echo $description." ..."; ?>
														   </td>
														   <td> <?php echo $row['author']; ?></td>
														  <td><img src="../../img/news/<?php echo $row['img']; ?>" class="img img-wd-200"> </td>
														  <td><?php 
								                          $parid=$row['category'];
								                       		echo $getcat = GetCatNm($parid);
								                            ?></td>
														  <td><?php echo $row['post_date']; ?></td>
														  <td class="text-nowrap">
														    <ul>
														    	<li>
															    <form method="post" action="edit_news.php">
																    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																	  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Edit" name="edit"> <i class="fa fa-pencil-alt text-inverse m-r-10"></i> </button>
		                                                        </form>
		                                                         </li>
		                                                         <li> 	
		                                                        <form method="post" >
		                                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Delete" name="delete" onclick="return confirm('Are you sure that you want to delete news?');" > <i class="fa fa-trash text-danger"></i> </button>
																</form>
																</li>
																<li> 	
		                                                        <form method="post">
		                                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
																  <button class="butn" type="submit" data-toggle="tooltip" data-original-title="Comments" name="comments"  > <i class="fa fa-comments text-success"></i> </button>
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
