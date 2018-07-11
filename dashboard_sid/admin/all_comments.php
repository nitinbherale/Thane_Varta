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
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.php">Dashboard</a></li>
								<li class="active"><span>View All Comments</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					<!-- /Row -->	
							
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
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

	                                                     $select_qry = "SELECT * FROM comments  order by id desc";

	                                                     $result = mysqli_query($dblink,$select_qry) or die("Cannot Fetch Data From Database" .mysqli_error($dblink));
	                                                     	$a=1;
	                                                      while ($row = mysqli_fetch_assoc($result)) { ?>
	                                                       
													   <tr>
														  <td>
														  	<?php echo $a; ?>
														  	
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
														  	<?php $status = $row['status']; 
												  			if ($status==0) { ?>
																<span class="text-primary"><b>Pending</b></span>
																<?php }
																elseif ($status==1) { ?>
																 <span class="text-success"><b>Approved</b></span>	
																<?php } 
																elseif ($status==2) { ?>
																 <span class="text-danger"><b>Dispproved</b></span>	
																<?php } 
																?>
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
