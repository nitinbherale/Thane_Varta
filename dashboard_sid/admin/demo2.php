<?php
include("connect.php");
  $opt = $_GET['opt'];
  $queryFinal="select * from news_category where status=0 and parent_id = $opt order by id";
 list($resultArray)=exc_qry($queryFinal);
 	if(count($resultArray)>0){
    for($i=0;$i<count($resultArray);$i++)
    {  
  echo '<option value = "'.$resultArray[$i]['id'].'"  >'.$resultArray[$i]['category'].'</option>';
  }
  }
  else{
    echo '<option value = "0" >--No sub category--</option>';
  }
?>