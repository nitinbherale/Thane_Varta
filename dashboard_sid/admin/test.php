<html>
<body>
	<?php  include 'connect.php';
    $news_tag=array();
        list($tags) = exc_qry('select tags from news where status = 0');
        //print_r($tags);
        for ($t=0; $t < count($tags); $t++) { 
            $i_tag = $tags[$t]['tags'];
            $list = array_map('trim',explode(",",$i_tag));
            for($i=0;$i<count($list);$i++){
            array_push($news_tag,$list[$i]);
            }
        }
        print_r($news_tag);
        $a=array("a"=>"red","b"=>"green","c"=>"red");
        print_r(array_unique($a));
       echo count(array_unique($a));    

?>
</body>
</script>
</html>