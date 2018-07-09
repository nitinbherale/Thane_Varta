<?php
function exc_qry($qry)
	{
		global $dblink;
        $resultArray=array();
       
        $queryFinal=$qry;//give the 20 values accronding to min value
        //echo $queryFinal;
		$resultQueryFinal=mysqli_query($dblink,$queryFinal);
		if(mysqli_num_rows($resultQueryFinal)>0)
		{
			while($RwGtAlSbmsn=mysqli_fetch_array($resultQueryFinal))
			{
				array_push($resultArray,$RwGtAlSbmsn);
			}
		}
  
 //	echo count($resultArray);
		return array($resultArray);
	}  

function get_cat_name($rec_id){;
	global $dblink;
        $qry="select * from news_category where id= '".$rec_id."'";
        // echo $qry;
        $GtId=mysqli_query($dblink,$qry);
        $GtId=mysqli_fetch_array($GtId);
        $CatNm=$GtId["category"];
        return $CatNm;
}
?>