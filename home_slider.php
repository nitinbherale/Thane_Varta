<?php $news_qry = "select * from news where status = 0 order by post_date desc,id desc";  
 list($news_result) = exc_qry($news_qry);
 ?>
    <!-- Slider Area Start Here -->
            <section class="section-space-bottom">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-xl-8 col-lg-12">
                            <div class="main-slider1 img-overlay-slider">
                                <div class="bend niceties preview-1">
                                    <div id="ensign-nivoslider-3" class="slides">
                                        <?php   for($i=0;$i<3;$i++) { 

                                            ?>
                                        <img src="img/news/<?php echo $news_result[$i]['img']; ?>" alt="slider" title="#slider-direction-<?php echo $news_result[$i]['id']; ?>"  />
                                    <?php } ?>
                                       <!--  <img src="img/banner/slide2.jpg" alt="slider" title="#slider-direction-2" />
                                        <img src="img/banner/slide3.jpg" alt="slider" title="#slider-direction-3" /> -->
                                    </div>
                                    <!-- direction 1 -->
                                    <?php   for($i=0;$i<3;$i++) {
                                        $heading = substr($news_result[$i]['heading'],0,100);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); 
                                                           $heading = str_replace(" ","_",$heading);
                                        ?>
                                    <div id="slider-direction-<?php echo $news_result[$i]['id']; ?>" class="t-cn slider-direction">
                                        <div class="slider-content s-tb slide-1">
                                            <div class="title-container s-tb-c">
                                                <div class="text-left pl-50 pl20-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20"><?php echo get_cat_name($news_result[$i]['category']) 
                                                    ?></div>
                                                    <div class="post-date-light d-none d-sm-block">
                                                        <ul>
                                                            <li>
                                                                <span>by</span>
                                                                <?php echo $news_result[$i]['author']; ?>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span><?php echo date("F d, Y", strtotime($news_result[$i]['post_date'])); ?> <!--March 22, 2017-->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="slider-title"><a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$heading;  ?>/" class="text-white"><?php echo $news_result[$i]['heading']; ?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <!-- direction 2 -->
                                  <!--   <div id="slider-direction-2" class="t-cn slider-direction">
                                        <div class="slider-content s-tb slide-2">
                                            <div class="title-container s-tb-c">
                                                <div class="text-left pl-50 pl20-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20">Chicken Pizza</div>
                                                    <div class="post-date-light d-none d-sm-block">
                                                        <ul>
                                                            <li>
                                                                <span>by</span>
                                                                <a href="single-news-1.html">Adams</a>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span>March 22, 2017</li>
                                                        </ul>
                                                    </div>
                                                    <div class="slider-title">Chicken Pizza with summer drinks recipe by mr. nanna products</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- direction 3 -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="item-box-light-md-less30 ie-full-width">
                                <div class="row">
                                     <?php   for($i=3;$i<7;$i++) {  
                                         $heading = substr($news_result[$i]['heading'],0,100);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); 
                                                           $heading2 = str_replace(" ","_",$heading);
                                        ?>
                                    <div class="media mb-30 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                        <a class="img-opacity-hover" href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$heading2;  ?>/">
                                            <img src="img/news/<?php echo $news_result[$i]['img']; ?>" width="124px" height="88px" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body media-padding5">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?php echo date("F d, Y", strtotime($news_result[$i]['post_date'])); ?></li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$heading2;  ?>/"><?php echo $heading." ..."; ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                        <?php } ?>
                                 <!--    <div class="media mb-30 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                        <a class="img-opacity-hover" href="single-news-1.html">
                                            <img src="img/news/news311.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body media-padding5">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>March 22, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news-2.html">Detoxifying Summer Drink Recipes</a>
                                            </h3>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Slider Area End Here -->
<style type="text/css">
    .text-white{
        color: white;
    }
    /*.nivo-main-image{
        height: 510px !important;
    }*/
    .slides{position: relative;width: 100%;height: 469px;display: block;overflow: hidden;background-repeat: no-repeat;}
    .slides img{position: absolute;height: 469px;top: 0;left: 0;width: 100%; margin: auto;}
</style>