<?php 
	session_start();
	error_reporting(0);
	$dbhost="localhost";
	$dbusername="root";
	$dbpassword="";
    $dbname="thane_varta";
	$dblink=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname)or die("Database connection failed!!!");
	if($dblink)
	{//	mysqli_select_db($dblink,$dbname);
		$MxAlw=25; //Paging limit
		include("function.php");
       // echo "This is my page";
         
	} else echo $PgErr="Page you have requested could not be found";   
?>