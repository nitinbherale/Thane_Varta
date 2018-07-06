<?php
function redirect($PgNm)
{   
    header("Location:$PgNm");
}
function isValidUser()
{
    global $dblink;
    $sess=session_id();
    $query_sel="select * from tv_admin where session_id='".$sess."' and status=0";
    $result_sel=mysqli_query($dblink,$query_sel);
    if(mysqli_num_rows($result_sel)>0) return 1;
    else    return 0;
}

function exc_qry($qry)
	{
		//echo "this get called";
		global $dblink;
        $resultArray=array();

		$resultQueryFinal=mysqli_query($dblink,$qry);
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


	function LgnChk($username,$password)
{
    global $dblink;
    $sess=session_id();
    $md5_pwd=md5($password);
    $query_sel="select * from tv_admin where username='".$username."' and password='".$md5_pwd."' and status = 0";
  // echo $query_sel;
    $result_sel=mysqli_query($dblink,$query_sel);
    if(mysqli_num_rows($result_sel)>0)
    {
       //echo "This function get called";
        $row=mysqli_fetch_array($result_sel);
        //echo count($row);
        $adminid=$row["id"];
        $_SESSION['sess_user_id']=$row["id"];
        $_SESSION['sess_user_nm']=$row["username"];
        $_SESSION['sess_user_mail']=$row['email'];
        $query_up="update tv_admin set session_id='".$sess."' where id=".$adminid;
        //echo $query_up;
        $result_up=mysqli_query($dblink,$query_up);
        if($result_up)  { echo  $err="";    }
        else { echo $err="Error in updating the admin details.";    }
    }
    else    {   $err="Invalid Username/Pasword.Please check";   }
    return $err;
}

function Forget_Password($email)
{
    global $dblink;
    $query_sel="select * from tbl_admin where email='".$email."' and status=0";
    $result_sel=mysqli_query($dblink,$query_sel);

    if(mysqli_num_rows($result_sel)>0)
    {
       $row=mysqli_fetch_array($result_sel);
        $adminid=$row["id"];
       $password = substr(md5(uniqid(rand(),1)),3,10);
        $pass = md5($password);
        $subject = 'Forgot Password';
        $emailTo = $email;
        $mailfrom   ='info@kreativekids.com';
        $headers = "From: ".$mailfrom;
        $text = "Hi \n you or someone else have requested Forgot Password. Here is your account information please keep this as you may need this at a later stage. Your password is $password.\nYour password has been reset, please login and change your password to something more rememberable. Regards Site Admin";
        if(mail($emailTo,$subject,$text,$headers))
        {
            $query_up="update tbl_admin set password ='".$pass."' where id=".$adminid;
        $result_up=mysqli_query($dblink,$query_up);
        if($result_up)  {   $err='<p style="color: green;">Mail sended successfully. <a href="login.php">Click Here</a> To Login</p>';  }
        else {  $err='<p style="color: red;">Error in updating the admin details.'; }
        }
        else
        {
            $err= '<p style="color: red;">mail sending fail</p>';
        }
    }
    else    {   $err='<p style="color: red;">Invalid Email ID.Please check</p>';    }
    return $err;
}
function check_category($catname,$id){
    global $dblink;
    if($id>0){
        $qry = 'select * from news_category where id != '.$id.' and category like "'.$catname.'" and status = 0';
        list($cat_count)=exc_qry($qry);
         //echo "<script>window.alert('".count($cat_count)."')</script>";
        if(count($cat_count)>0){
            return 0;
        }
        else{
            return 1;
        }     
    }
    else
    {
        $qry = 'select * from news_category where category like "'.$catname.'" and status = 0';
        list($cat_count)=exc_qry($qry);
         //echo "<script>window.alert('".count($cat_count)."')</script>";
        if(count($cat_count)>0){
            return 0;
        }
        else{
            return 1;
        }     
    }
}
function All_Delete($del_arr,$tbl_name)
{
    global $dblink;
    $time=time();
    //echo count($del_arr);
    if (count($del_arr)==0)
    {
        $msg = "Please select data to delete";
    }
    else{
    for($i=0;$i<count($del_arr);$i++)
        {
            //$query2="delete $tbl_name where  (image_name,Celeb_id) values('$galimagename[$i]',$gallery)";
             $query2="update $tbl_name set status = 1 where id = $del_arr[$i]";
            
            $result2=mysqli_query($dblink,$query2);
            if($result2)
            {
                $msg = count($del_arr)." Records Deleted Successfully";
            }
        }
  }
    return $msg;
}
function Set_Top($del_arr,$tbl_name)
{
    global $dblink;
    $time=time();
     if (count($del_arr)==0)
    {
        $msg = "Please select data ";
    }
    else{
    for($i=0;$i<count($del_arr);$i++)
        {
     $QryChkFaqExists="select * from $tbl_name where id=$del_arr[$i]";
    $ResChkFaqExists=mysqli_query($dblink,$QryChkFaqExists);
    mysqli_num_rows($ResChkFaqExists);
    if(mysqli_num_rows($ResChkFaqExists)>0)
    {  
       $row=mysqli_fetch_array($ResChkFaqExists);
    //break;
       if ($row["top"]==0)
        {
         $QryDelFaq="update $tbl_name set top=1 where id=$del_arr[$i]"; 
        }
        else
        {
         $QryDelFaq="update $tbl_name set top=0 where id=$del_arr[$i]";
        }
        //echo $QryDelFaq;
        if(mysqli_query($dblink,$QryDelFaq))    $msg="Success";
        
    }
    else    $msg="Content does not exist.";
        }
        }        
    return $msg;
}
function Comment($del_arr,$tbl_name,$select)
{
    global $dblink;
    //echo count($del_arr);
    if (count($del_arr)==0)
    {
        $msg = "Please select data";
    }
    else{
    for($i=0;$i<count($del_arr);$i++)
        {
            //$query2="delete $tbl_name where  (image_name,Celeb_id) values('$galimagename[$i]',$gallery)";
             $query2="update $tbl_name set status = $select where id = $del_arr[$i]";
            
            $result2=mysqli_query($dblink,$query2);
            if($result2)
            {
             if($select == 1){
                $msg = "Records Approved";
                }
                else
                {
                $msg = "Records Disapproved";
                }
            }
        }
  }
    return $msg;
}
function InsSubCategoryDtls($catname,$id)
{
    global $dblink;
    $query="select * from news_category where parent_id=$id and category like '$catname'";
    //echo $query;
    $result=mysqli_query($dblink,$query);
    if(mysqli_num_rows($result)>0)
    {
        $msg="Subcategory name already exists.";
    }
    else
    { 
       $date = date('Y-m-d');
        $query_in="insert into news_category set category = '$catname',parent_id = $id,add_date = '$date',edit_date = '$date' ";
        
        $res_in=mysqli_query($dblink,$query_in);
        if($res_in)
        {
            $msg="Success";
        }
    }
    return $msg;
}
function updateSubcategory($catname,$catid,$id)
{
    global $dblink;
    $query="select * from news_category where id!=$id and category like '$catname' and status=0"; 
    $result=mysqli_query($dblink,$query);
    if(mysqli_num_rows($result)>0)
    {
        $msg="The name already exists for another category. Kindly choose another name.";
        return $msg;
    }
    else
    {
        $query="update news_category set category='$catname' where id = $id and  parent_id= $catid  and status=0";
        $result=mysqli_query($dblink,$query);
    }

    if($result)
    {
        $msg="Success";
        return $msg;
    }
}
function online_users()
{
    //echo "This get called";
    global $dblink;
    $time = time();
    $time_out_in_seconds = 120;
    $time_out = $time - $time_out_in_seconds;
    $user_online_qry = mysqli_query($dblink,"select * from user_online where time > '$time_out'");
    return $count_user = mysqli_num_rows($user_online_qry);
}

?>
