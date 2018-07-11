 <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
    <div class="sidebar-box">
        <div class="topic-border color-cod-gray mb-30">
            <div class="topic-box-lg color-cod-gray">Stay Connected</div>
        </div>
         <ul class="stay-connected overflow-hidden">
            <li class="facebook">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <div class="connection-quantity">50.2 k</div>
                <p>Fans</p>
            </li>
            <li class="twitter">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <div class="connection-quantity">10.3 k</div>
                <p>Followers</p>
            </li>
            <li class="linkedin">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
                <div class="connection-quantity">25.4 k</div>
                <p>Fans</p>
            </li>
            <li class="rss">
                <i class="fa fa-rss" aria-hidden="true"></i>
                <div class="connection-quantity">20.8 k</div>
                <p>Subscriber</p>
            </li>
        </ul>
    </div>
    <div class="sidebar-box">
        <div class="ne-banner-layout1 text-center">
            <a href="#">
                <img src="img/banner/banner3.jpg" alt="ad" class="img-fluid">
            </a>
        </div>
    </div>
    <div class="sidebar-box">
        <div class="topic-border color-cod-gray mb-5">
            <div class="topic-box-lg color-cod-gray">Recent News</div>
        </div>
        <?php $news_qry = "select * from news where status = 0 and id != $newz_id order by post_date desc,id desc";  
         list($news_result) = exc_qry($news_qry);
         ?>
        <div class="row">
             <?php   for($i=0;$i<6;$i++) {?>
            <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                <div class="mt-25 position-relative">
                    <div class="topic-box-top-xs">
                        <div class="topic-box-sm color-cod-gray mb-20"><?php echo get_cat_name($news_result[$i]['category']); ?></div>
                    </div>
                    <a href="#" class="mb-10 display-block img-opacity-hover">
                        <img src="img/news/<?php echo $news_result[$i]['img']; ?>" height="117px" alt="ad" class="img-fluid m-auto width-100">
                    </a>
                    <h3 class="title-medium-dark size-md mb-none">
                        <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$news_result[$i]['heading']  ?>/">
                            <?php $heading = substr($news_result[$i]['heading'],0,100);
                            if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); echo $heading." ..."; ?></a>
                    </h3>
                </div>
            </div>
             <?php } ?>
           <!--  <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                <div class="mt-25 position-relative">
                    <div class="topic-box-top-xs">
                        <div class="topic-box-sm color-cod-gray mb-20">Application</div>
                    </div>
                    <a href="#" class="mb-10 display-block img-opacity-hover">
                        <img src="img/news/news172.jpg" alt="ad" class="img-fluid m-auto width-100">
                    </a>
                    <h3 class="title-medium-dark size-md mb-none">
                        <a href="#">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty Habits.</a>
                    </h3>
                </div>
            </div> -->
        </div>
    </div>
        <div class="sidebar-box">
            <div class="topic-border color-cod-gray mb-30">
                <div class="topic-box-lg color-cod-gray">Newsletter</div>
            </div>
            <div class="newsletter-area bg-primary">
                <h2 class="title-medium-light size-xl pl-30 pr-30">Subscribe to our mailing list to get the new updates!</h2>
                <img src="img/banner/newsletter.png" alt="newsletter" class="img-fluid m-auto mb-15">
                <p>Subscribe our newsletter to stay updated</p>
                <div class="input-group stylish-input-group">
                    <input type="text" placeholder="Enter your mail" class="form-control">
                    <span class="input-group-addon">
                        <button type="submit">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="sidebar-box">
            <div class="topic-border color-cod-gray mb-25">
                <div class="topic-box-lg color-cod-gray">Tags</div>
            </div>
            <?php list($tags) = exc_qry('select tags from news where status = 0'); ?>
            <ul class="sidebar-tags">
               <?php  $news_tag=array(); 
               for ($t=0; $t < count($tags); $t++) { 
                    $i_tag = $tags[$t]['tags'];
                    $list = array_map('trim',explode(",",$i_tag));
                    for($i=0;$i<count($list);$i++){
                    array_push($news_tag,$list[$i]);
                    }
                } ?>

                <?php for ($r=0; $r < 12 ; $r++) { ?>
                    <li>
                    <a href="tags/<?php echo $news_tag[$r]; ?>/"><?php echo $news_tag[$r]; ?></a>
                </li>
                
                <?php } ?>
                
            </ul>
        </div>
                           <!--  <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">Most Reviews</div>
                                </div>
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">Apple</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="#">
                                            <img src="img/news/news117.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>February 10, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="#">Can Be Monit roade year with Program.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">Gadgets</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="#">
                                            <img src="img/news/news118.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>June 06, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="#">Can Be Monit roade year with Program.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">Software</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="#">
                                            <img src="img/news/news119.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>August 22, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="#">Can Be Monit roade year with Program.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">Tech</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="#">
                                            <img src="img/news/news120.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>February 10, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="#">Can Be Monit roade year with Program.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">Ipad</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="#">
                                            <img src="img/news/news121.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>February 10, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="#">Can Be Monit roade year with Program.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
 </div>