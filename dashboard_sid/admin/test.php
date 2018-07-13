<?php

$url = "https://www.facebook.com/rdtikhe/";  //This could be anything URL source including stripslashes($_POST['url'])
// $url = urlencode($source_url);
// //echo $url;
// $xml = file_get_contents($url);

$homepage = file_get_contents($url);
echo ($homepage);// $xml = simplexml_load_string($xml);
// $shares =  $xml->link_stat->share_count;
// $likes =  $xml->link_stat->like_count;
// $comments = $xml->link_stat->comment_count;
// $total = $xml->link_stat->total_count;
// $max = max($shares,$likes,$comments);
//echo $likes;
?>