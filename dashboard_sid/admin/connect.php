<?php 
ob_start();
session_start();
error_reporting(0);
$server = "localhost";
$username = "root";
$db_password = "";
$dbname = "thane_varta";
$dblink = mysqli_connect($server,$username,$db_password,$dbname)or die("Database connection failed!!!");
if ($dblink) {
	
	include 'functions.php';
	//echo "database connected";
}
if(isset($_SESSION['last_action'])){
    $expireAfter = 10;
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        $CookieInfo = session_get_cookie_params();
   if ( (empty($CookieInfo['domain'])) && (empty($CookieInfo['secure'])) ) {
       setcookie(session_name(), '', time()-3600, $CookieInfo['path']);
   } elseif (empty($CookieInfo['secure'])) {
       setcookie(session_name(), '', time()-3600, $CookieInfo['path'], $CookieInfo['domain']);
   } else {
       setcookie(session_name(), '', time()-3600, $CookieInfo['path'], $CookieInfo['domain'], $CookieInfo['secure']);
   }
   unset($_COOKIE[session_name()]);
   session_destroy();
  //+----------------------------------------DESTROY THE SESSION---------------------------------------------------------*/ 
  header("login.php");
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();
?>