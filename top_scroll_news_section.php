<?php $tp_news_qry = "select * from news where status = 0 and top = 1 order by post_date desc,id desc";  
 list($top_news) = exc_qry($tp_news_qry);
 ?>
<!-- News Feed Area Start Here -->
            <section class="container">
                <div class="bg-body-color ml-15 pr-15 mb-10 mt-10">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                            <div class="topic-box">Top Stories</div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                            <div class="feeding-text-light2">
                                <ol id="sample" class="ticker">
                                    <?php   for($i=0;$i<count($top_news);$i++) {?>
                                    <li>
                                        <a href="single_page_news/<?php echo  $top_news[$i]['id'].'/'.$top_news[$i]['heading']  ?>/"> <?php echo $top_news[$i]['heading']; ?></a>
                                    </li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Feed Area End Here -->