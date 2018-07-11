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
 function Paging($Pg)
{
	global $MxAlw; 
	if(strlen($Pg)<=0)
    {	$Pg=1;
    }
	$max=($Pg*$MxAlw);
    if($Pg==1) $min=0; else $min=$max-$MxAlw;// if pg = 2 then min value is different
	return	array($min,$MxAlw,$Pg);
}
function listData($Pg,$qry) //pagingation code
	{
	  // echo "This is called";
		global $dblink;
        $resultArray=array();
		list($min,$max,$Pg)=Paging($Pg);  
        $query=$qry;
        //echo $query;
		$result=mysqli_query($dblink,$query);
		$Ttl=mysqli_num_rows($result);
   		$TtlPg=ceil($Ttl/$max);
		if(($TtlPg<$Pg) && ($TtlPg>0)) list($min,$max,$Pg)=Paging($Pg-1);
        $queryFinal=$qry." limit $min,$max";//give the 20 values accronding to min value
        //echo $queryFinal;
		$resultQueryFinal=mysqli_query($dblink,$queryFinal);
		if(mysqli_num_rows($resultQueryFinal)>0)
		{
			while($RwGtAlSbmsn=mysqli_fetch_array($resultQueryFinal))
			{
				array_push($resultArray,$RwGtAlSbmsn);
			}
		}
		return array($TtlPg,$Pg,$resultArray,$Ttl);
	}

?>