<?php include("connect.php");
//+----------------------------------------DESTROY THE SESSION---------------------------------------------------------*/
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
  redirect("login.php");
?>
