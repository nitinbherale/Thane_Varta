             <!-- Breadcrumb Area Start Here -->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    <div class="breadcrumbs-content">
                        <h1><?php echo get_cat_name($cat_id); ?></h1>
                        <ul>
                            <li>
                                <a href="index/">Home</a> -</li>
                            <li><?php echo get_cat_name($cat_id); ?></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End Here -->
            <!-- Archive Page Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <form id="archive-search" class="archive-search-box bg-accent item-shadow-1">
                                <div class="row tab-space5">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <div class="ne-custom-select">
                                                <select id="ne-year" class='select2'>
                                                    <option value="0">Select Year</option>
                                                    <option value="1">2000</option>
                                                    <option value="2">2001</option>
                                                    <option value="3">2002</option>
                                                    <option value="4">2003</option>
                                                    <option value="5">2004</option>
                                                    <option value="6">2005</option>
                                                    <option value="7">2006</option>
                                                    <option value="8">2007</option>
                                                    <option value="9">2008</option>
                                                    <option value="10">2009</option>
                                                    <option value="11">2010</option>
                                                    <option value="12">2011</option>
                                                    <option value="13">2012</option>
                                                    <option value="14">2013</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <div class="ne-custom-select">
                                                <select id="ne-month" class='select2'>
                                                    <option value="0">Select Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <div class="ne-custom-select">
                                                <select id="ne-categories" class='select2'>
                                                    <option value="0">Select Categories</option>
                                                    <option value="1">Sports</option>
                                                    <option value="2">Politics</option>
                                                    <option value="3">Tech</option>
                                                    <option value="4">Travel</option>
                                                    <option value="5">Fashion</option>
                                                    <option value="6">Business</option>
                                                    <option value="7">Food</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-right">
                                        <button type="submit" class="btn-ftg-ptp-40 disabled mb-5">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <?php  $MxAlw = 1;
                                $cat_new_qry = "select * from news where status = 0 and category = $cat_id or sub_category = $cat_id order by post_date";
                                list($TtlPg,$Pg,$news,$Ttl) =  listData($Pg,$cat_new_qry);
                                //echo count($news);
                                for ($i=0; $i < count($news); $i++) { 
                                 ?>

                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="media media-none--lg mb-30">
                                        <div class="position-relative width-40">
                                            <a href="single-news-1.html" class="img-opacity-hover img-overlay-70">
                                                <img src="img/news/<?php echo $news[$i]['img']; ?>" alt="news" class="img-fluid">
                                            </a>
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20"> <?php echo  get_cat_name($news[0]['category']) ?></div>
                                            </div>
                                        </div>
                                        <div class="media-body p-mb-none-child media-margin30">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>by</span>
                                                        <a><?php echo $news[$i]['author']; ?></a>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?php echo date("F d, Y", strtotime($news[$i]['post_date'])); ?></li>
                                                </ul>
                                            </div>
                                            <h3 class="title-semibold-dark size-lg mb-15">
                                                <a href="single_page_news/<?php echo  $news[$i]['id'].'/'.$news[$i]['heading']  ?>/"><?php $heading = substr($news[$i]['heading'],0,100);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); echo $heading." ..."; ?></a>
                                            </h3>
                                            <p><?php $description = substr($news[$i]['content'],0,500);
                                                           if(substr($description, 0, strrpos($description, ' '))!='') $description = substr($description, 0, strrpos($description, ' ')); echo $description." ..."; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
<!--                                 <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="media media-none--lg mb-30">
                                        <div class="position-relative width-40">
                                            <a href="single-news-1.html" class="img-opacity-hover img-overlay-70">
                                                <img src="img/news/news141.jpg" alt="news" class="img-fluid">
                                            </a>
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20">Adventure</div>
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
                                                <a href="single-news-1.html">Erik Jones has day he won’t soon forget as Denny backup at Bristol</a>
                                            </h3>
                                            <p>Separated they live in the coast of the Semantics, a large language ocean. A
                                                river named Duden flows by their place and ...
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                          

                            </div>
                            <?php
                        if($TtlPg>1)
                        {?>
                            <div class="row mt-20-r mb-30">
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                                        <ul>
                                            <?php if($Pg>1)
                                            {   $PrvPrPg=$Pg-1; ?>
                                            <li >
                                                <a href="#"><?php echo $PrvPrPg;?></a>
                                            </li>
                                        <?php } if($TtlPg>$Pg)
                        {
                            $NxtPrPg=$Pg+1;?>
                                            <li>
                                                <a href="#"><?php echo $NxtPrPg;?></a>
                                            </li>
                                            <?php } ?>
                                            <!-- <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-result text-right pt-10 text-center--xs">
                                        <p class="mb-none">Page <?php echo  $Pg." of ".$TtlPg ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">Stay Connected</div>
                                </div>
                                <ul class="stay-connected overflow-hidden">
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
                            <div class="sidebar-box">
                                <div class="ne-banner-layout1 text-center">
                                    <a href="#">
                                        <img src="img/banner/banner3.jpg" alt="ad" class="img-fluid">
                                    </a>
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
                                <ul class="sidebar-tags">
                                    <li>
                                        <a href="#">Apple</a>
                                    </li>
                                    <li>
                                        <a href="#">Business</a>
                                    </li>
                                    <li>
                                        <a href="#">Architecture</a>
                                    </li>
                                    <li>
                                        <a href="#">Gadgets</a>
                                    </li>
                                    <li>
                                        <a href="#">Software</a>
                                    </li>
                                    <li>
                                        <a href="#">Microsoft</a>
                                    </li>
                                    <li>
                                        <a href="#">Robotic</a>
                                    </li>
                                    <li>
                                        <a href="#">Technology</a>
                                    </li>
                                    <li>
                                        <a href="#">Others</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Archive Page Area End Here -->