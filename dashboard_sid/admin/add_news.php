<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<div class="wrapper theme-1-active pimary-color-blue">

<?php include("header.php"); if(!isValidUser())   redirect("login.php");  ?>
<?php include("left_sidebar.php") ?>

<?php include("right_sidebar_backdrop.php") ?>
<?php
  if (isset($_POST['add'])) {
  	$go = 1;
  	$heading =  mysqli_real_escape_string($dblink,$_POST["title"]); 
    $content =  mysqli_real_escape_string($dblink,$_POST["description"]); 
    $author =  mysqli_real_escape_string($dblink,$_POST["author"]); 
    $category = $_POST["cat"];
    $tags =  mysqli_real_escape_string($dblink,$_POST['news_tag']);
    $meta_tag =  mysqli_real_escape_string($dblink,$_POST["meta_keywords"]); 
    $sub_cat =  mysqli_real_escape_string($dblink,$_POST["sub_cat"]);  
    $meta_description =  mysqli_real_escape_string($dblink,$_POST["meta_description"]);          
    $imgpath = "../../img/news/";    
    $photo = $_FILES['img'];
    $tmp = strtolower(time()."_".$_FILES['img']['name']);
  // echo '<script> my_function("'.$_FILES['img']['name'].'"); </script>';
    	if(!move_uploaded_file($photo["tmp_name"],$imgpath.$tmp))//storing image in file
            {
                echo '<script> my_function("Image Upload Failed"); </script>';
        		$go = 0;
            }
		if($go)
		{
			$insquery .= "heading = '" . $heading . "'";            
            $insquery .= ",content = '" . $content . "'";
			$insquery .= ",author = '" . $author . "'";			
			$insquery .= ",category = '" . $category. "'";
            $insquery .= ",tags = '".$tags."'";
            $insquery .= ",meta_description = '" . $meta_description. "'";
            $insquery .= ",meta_tag = '" . $meta_tag. "'";
            $insquery .= ",sub_category = ".$sub_cat."";
            $date = date('Y-m-d');
            $insquery .= ",edit_date = '" . $date. "'"; 
	            if(strlen($photo['name'])>0)
				{
					//echo "<script>window.alert('going to image')</script>";
	      //   		$image = imagecreatefromjpeg($_FILES['img']['tmp_name']);//fetch image
	  				// $watermark = imagecreatefromjpeg("logo.jpg");//watermark image 
	  				// $wat_height = imagesy($watermark);//height of watemark
	  				// $wat_width = imagesx($watermark);//width of watermark
	  				// $start_y = imagesy($image)-(imagesy($image)-10);//start point to draw image
	  				// $start_x = imagesx($image)-(imagesx($image)-10);//start point to draw image
	  				// imagecopymerge($image, $watermark, $start_x, $start_y, 0, 0,$wat_width,$wat_height, 50);
	  				// //image file,watermark,start point x,start point y, shadow width x,shadow width y, watermark width,watermark height, opacity
	  				// imagejpeg($image,'../../img/news/'.$Thumb_img.'');
					$insquery .= ",img = '" . $tmp . "'";  
					
				}
					 $insquery = "insert into news set post_date = '".$date."',".$insquery;
		 			$result = mysqli_query($dblink,$insquery);
					if($result)
					{
					echo '<script> success_message("Success","success","News Added Successfully","add_news.php");  </script>';
					}
					else
					{
					echo '<script> my_function("Sorry ! we are unable to process your request"); </script>';
					}
		  }
}
$MyQuery = "select * from news_category where status = 0 and parent_id = 0 order by id";     
list($list_Cat)=exc_qry($MyQuery);
?>
<script type="text/javascript">
	$( document ).ready(function() {
	var a =	document.getElementById('category').value;
     var xmlhttp;
      //alert(str);
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","demo.php?opt="+a, true);
      xmlhttp.send();
});
   function update(str)
   {
      var xmlhttp;
     // alert(str);
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","demo.php?opt="+str, true);
      xmlhttp.send();
  }
</script>					
<!-- Main Content -->
	<div class="page-wrapper">
		<div class="container-fluid">
			
			<!-- Title -->
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark">Add News</h5>
				</div>

				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">Dashboard</a></li>
						<li><a href="news.php">News</a></li>
						<li class="active"><span>Add News</span></li>
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
								<h6 class="panel-title txt-dark">Add News</h6>
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
													<label class="control-label mb-10" for="exampleInputuname_1">Title *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Heading of news" name="title" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuname_1">Description *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<textarea type="text" class="form-control" id="exampleInputuname_1" rows="5" placeholder="Description of news" name="description" required></textarea> 
													</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_1">News Image *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
														<input type="file" name="img" accept="image/jpg,image/jpeg"  id="input-file-max-fs" class="dropify"  data-max-file-size="2M"  required  />
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuname_1">Author *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Author of news" name="author" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuname_1">News Tags * (Please Separate tags using ',')</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<input type="text" class="form-control" id="exampleInputuname_1" placeholder="News Tags" name="news_tag" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuname_1">Meta Keywords *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<input type="text" class="form-control" id="exampleInputuname_1" placeholder="Meta Keywords" name="meta_keywords" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputuname_1">Meta Description *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<textarea type="text" class="form-control" id="exampleInputuname_1" rows="5" placeholder="Meta Description" name="meta_description" required></textarea> 
													</div>
												</div>

												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputpwd_1"> Category *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-lock"></i></div>
														<select class="form-control" required onchange="update(this.value)"  name="cat" id="category">
															<?php 
													      for($vid=0;$vid < count($list_Cat);$vid++){?><option value="<?php echo $list_Cat[$vid]["id"];?>" 
													       <?php if($list_Cat[$vid]["id"]==$catid)
													       { echo "selected";}?>><?php echo $list_Cat[$vid]["category"];?></option><?php }?>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputpwd_1"> Sub Category *</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-lock"></i></div>
														<select class="form-control" id="data" name="sub_cat" required 
														>
															<option value="0">--No Sub category--</option>   
														      <?php                 
														      for($vid=0;$vid < count($list_subCat);$vid++){?><option value="<?php echo $list_subCat[$vid]["id"];?>" 
														       <?php if($list_subCat[$vid]["id"]==$sub_cat)
														       { echo "selected";}?>><?php echo $list_subCat[$vid]["category"];?></option><?php }?>
														</select>
													</div>
												</div>
												<button type="submit" class="btn btn-success mr-10" name="add">Add</button>
												<button type="button" class="btn btn-default mr-10" onclick="window.location='news.php'">Back</button>
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
					<p>2018 &copy; Thane Varta</p>
				</div>
			</div>
		</footer>
		<!-- /Footer -->

		
	
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
