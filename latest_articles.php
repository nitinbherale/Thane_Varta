<!-- Latest Articles Area Start Here -->
            <section class="section-space-bottom-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 mb-30">
                            <div class="item-box-light-md-less30 ie-full-width">
                                <div class="topic-border color-cinnabar mb-30">
                                    <div class="topic-box-lg color-cinnabar">News</div>
                                </div>
                                <div class="row">
                                    <?php for($i=7;$i<11;$i++) {?>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="media media-none--md mb-30">
                                            <div class="position-relative width-40">
                                                <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$news_result[$i]['heading']  ?>/" class="img-opacity-hover">
                                                    <img src="img/news/<?php echo $news_result[$i]['img']; ?>" alt="news" class="img-fluid img-news img-responsive ">
                                                </a>
                                                <div class="topic-box-top-xs">
                                                    <div class="topic-box-sm color-cod-gray mb-20"><?php echo get_cat_name($news_result[$i]['category']) 
                                                    ?></div>
                                                </div>
                                            </div>
                                            <div class="media-body p-mb-none-child media-margin30">
                                                <div class="post-date-dark">
                                                    <ul>
                                                        <li>
                                                            <span>by</span>
                                                            <a ><?php echo $news_result[$i]['author']; ?></a>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </span><?php echo date("F d, Y", strtotime($news_result[$i]['post_date'])); ?></li>
                                                    </ul>
                                                </div>
                                                <h3 class="title-semibold-dark size-lg mb-15">
                                                    <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$news_result[$i]['heading']  ?>/">
                                                        <?php $heading = substr($news_result[$i]['heading'],0,100);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); echo $heading." ..."; ?>
                                                    </a>
                                                </h3>
                                                <p><?php $description = substr($news_result[$i]['content'],0,500);
                                                           if(substr($description, 0, strrpos($description, ' '))!='') $description = substr($description, 0, strrpos($description, ' ')); echo $description." ..."; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                               <!--      <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="media media-none--md mb-30">
                                            <div class="position-relative width-40">
                                                <a href="single-news-2.html" class="img-opacity-hover">
                                                    <img src="img/news/news295.jpg" alt="news" class="img-fluid">
                                                </a>
                                                <div class="topic-box-top-xs">
                                                    <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                                                </div>
                                            </div>
                                            <div class="media-body p-mb-none-child media-margin30">
                                                <div class="post-date-dark">
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
                                                <h3 class="title-semibold-dark size-lg mb-15">
                                                    <a href="single-news-2.html">Quick Tips: Cling Wrap Hack One Pot Chef</a>
                                                </h3>
                                                <p>Separated they live in Bookmarksgrove right at the coast of the Semantics,
                                                    a large language ocean. A small river named Duden flows by their place
                                                    and ...
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->                                  
                                </div>
                            </div>
                        </div>
                        <div class="ne-sidebar sidebar-break-lg col-xl-4 col-lg-12">
                            <div class="sidebar-box item-box-light-md">
                                <div class="topic-border color-cinnabar mb-30">
                                    <div class="topic-box-lg color-cinnabar">Stay Connected</div>
                                </div>
                                <ul class="stay-connected-color overflow-hidden">
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <div class="connection-quantity">50.2 k</div>
                                            <p>Fans</p>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <div class="connection-quantity">10.3 k</div>
                                            <p>Followers</p>
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            <div class="connection-quantity">25.4 k</div>
                                            <p>Fans</p>
                                        </a>
                                    </li>
                                    <li class="rss">
                                        <a href="#">
                                            <i class="fa fa-rss" aria-hidden="true"></i>
                                            <div class="connection-quantity">20.8 k</div>
                                            <p>Subscriber</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-box item-box-light-md-less30">
                               <!--  <ul class="btn-tab item-inline block-xs nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#recent" data-toggle="tab" aria-expanded="true" class="active">Recent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#popular" data-toggle="tab" aria-expanded="false">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#common" data-toggle="tab" aria-expanded="false">Common</a>
                                    </li>
                                </ul> -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show" id="recent">
                                        <div class="row">
                                             <?php for($i=11;$i<19;$i++) {?>
                                            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                                <div class="position-relative">
                                                    <div class="topic-box-top-xs">
                                                        <div class="topic-box-sm color-cod-gray mb-20"><?php echo get_cat_name($news_result[$i]['category']) ?></div>
                                                    </div>
                                                    <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$news_result[$i]['heading']  ?>/" class="img-opacity-hover">
                                                        <img src="img/news/<?php echo $news_result[$i]['img']; ?>" alt="news" class="img-fluid width-100 mb-10">
                                                    </a>
                                                    <h3 class="title-medium-dark size-sm mb-none">
                                                        <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$news_result[$i]['heading']  ?>/"> <?php $heading = substr($news_result[$i]['heading'],0,80);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); echo $heading." ..."; ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                   
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest Articles Area End Here -->
<style type="text/css">
    .img-news{
        height: 171px !important;
        width: 268px !important;
    }
</style>