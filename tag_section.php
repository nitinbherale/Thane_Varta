             <!-- Breadcrumb Area Start Here -->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    <div class="breadcrumbs-content">
                        <h1><?php echo $tag; ?></h1>
                        <ul>
                            <li>
                                <a href="index/">Home</a> -</li>
                            <li><?php echo $tag; ?></li>
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
                            <div class="row">
                                <?php  $MxAlw = 1;
                                //echo $cat_new_qry;
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
                                                <div class="topic-box-sm color-cod-gray mb-20"> <?php echo  get_cat_name($news[0]['category'])?></div>
                                            </div>
                                        </div>
                                        <div class="media-body p-mb-none-child media-margin30">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>by</span>
                                                        <a><?php echo $news[$i]['author'];  ?></a>
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
                                            {   $PrvPrPg=$Pg-1; 
                                                if($PrvPrPg!=1){ 
                                                $left = $PrvPrPg-1; ?>
                                                    <li >
                                                <a href="tag/<?php echo $tag.'/'.$left.'/' ;?>"><span class="fa fa-chevron-left"></span></a>
                                            </li>
                                               <?php  }
                                                ?>
                                            <li >
                                                <a href="tag/<?php echo $tag.'/'.$PrvPrPg.'/' ;?>"><?php echo $PrvPrPg;?></a>
                                            </li>
                                        <?php } ?>
                                        <li class="active">
                                                <a ><?php echo $Pg;?></a>
                                            </li>
                                      <?php  if($TtlPg>$Pg)
                        {
                            $NxtPrPg=$Pg+1;?>
                                            <li>
                                                <a href="tag/<?php echo $tag.'/'.$NxtPrPg.'/' ;?>"><?php echo $NxtPrPg;?></a>

                                            </li>

                                           <?php  if($NxtPrPg!=$TtlPg){ 
                                                $right = $NxtPrPg+1; ?>
                                                    <li >
                                                <a href="tag/<?php echo $tag.'/'.$right.'/' ;?>"><span class="fa fa-chevron-right"></span></a>
                                            </li>
                                               <?php  }
                                                ?>
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
                        <?php include 'right_side.php';?>
                    </div>
                </div>
            </section>
            <!-- Archive Page Area End Here -->