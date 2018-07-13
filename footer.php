  <?php $news_qry = "select * from news where status = 0 order by post_date desc,id desc";  
 list($news_result) = exc_qry($news_qry);
 ?>
            <!-- Footer Area Start Here -->
            <footer>
                <div class="footer-area-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="footer-box">
                                    <h2 class="title-bold-light title-bar-left text-uppercase">Recent Posts</h2>
                                    <ul class="most-view-post">
                                          <?php for($i=0;$i<3;$i++) {
                                             $heading = substr($news_result[$i]['heading'],0,100);
                                                           if(substr($heading, 0, strrpos($heading, ' '))!='') $heading = substr($heading, 0, strrpos($heading, ' ')); 
                                                           $heading2 = str_replace(" ","_",$heading);
                                            ?>
                                        <li>
                                            <div class="media">
                                                <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$heading2;  ?>/">
                                                    <img src="img/news/<?php echo $news_result[$i]['img']; ?>"  alt="post" class="img-fluid img-footer">
                                                </a>
                                                <div class="media-body">
                                                    <h3 class="title-medium-light size-md mb-10">
                                                        <a href="single_page_news/<?php echo  $news_result[$i]['id'].'/'.$heading2;  ?>/"> <?php  echo $heading." ..."; ?></a>
                                                    </h3>
                                                    <div class="post-date-light">
                                                        <ul>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span><?php echo date("F d, Y", strtotime($news_result[$i]['post_date'])); ?> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                       <!--  <li>
                                            <div class="media">
                                                <a href="post-style-2.html">
                                                    <img src="img/footer/post2.jpg" alt="post" class="img-fluid">
                                                </a>
                                                <div class="media-body">
                                                    <h3 class="title-medium-light size-md mb-10">
                                                        <a href="#">Basketball Stars Face Off in ate Playoff Beard Battle</a>
                                                    </h3>
                                                    <div class="post-date-light">
                                                        <ul>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span>August 22, 2017</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-box">
                                    <h2 class="title-bold-light title-bar-left text-uppercase">Quick Link</h2>
                                    <ul class="popular-categories">
                                        <?php list($category) = exc_qry('select * from news_category where status = 0 and parent_id = 0 order by id ');
                                                for ($i=0; $i < count($category); $i++) { 
                                                 ?>
                                        <li>
                                            <a href="category/<?php echo $category[$i]['id'].'/'.$category[$i]['category']; ?>/">
                                                <?php echo $category[$i]['category']; ?>
                                                <span>
                                                    <?php $cat_id = $category[$i]['id'];
                                                    list($count_news) = exc_qry('select * from news where status = 0 and category = '.$cat_id);
                                                    echo count($count_news); 
                                                  //echo $cat_id;                                                     ?>
                                                </span>
                                            </a>
                                        </li>
                                         <?php } ?>
                                       
                                        <li>
                                            <a href="contact/">संपर्क</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-box">

                                    <div class="fb-page" data-href="https://www.facebook.com/rdtikhe/" data-tabs="timeline" data-height="350"   data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/rdtikhe/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/rdtikhe/">Ramchandra Tikhe</a></blockquote></div>
                                    <!-- <h2 class="title-bold-light title-bar-left text-uppercase">Post Gallery</h2> -->
                                   <!--  <ul class="post-gallery shine-hover "> -->
                                        <!-- <li>
                                            <a href="gallery-style1.html">
                                                <figure>
                                                    <img src="img/footer/post4.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style2.html">
                                                <figure>
                                                    <img src="img/footer/post5.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style1.html">
                                                <figure>
                                                    <img src="img/footer/post6.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style2.html">
                                                <figure>
                                                    <img src="img/footer/post7.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style1.html">
                                                <figure>
                                                    <img src="img/footer/post8.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style2.html">
                                                <figure>
                                                    <img src="img/footer/post9.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li> -->
                                       <!--  <li>
                                            <a href="gallery-style1.html">
                                                <figure>
                                                    <img src="img/footer/post10.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style2.html">
                                                <figure>
                                                    <img src="img/footer/post11.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-style1.html">
                                                <figure>
                                                    <img src="img/footer/post12.jpg" alt="post" class="img-fluid">
                                                </figure>
                                            </a>
                                        </li>-->
                                    <!-- </ul>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-area-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="index/" class="footer-logo img-fluid">
                                    <img src="img/logo.jpg" alt="logo" class="img-fluid">
                                </a>
                                <ul class="footer-social">
                                    <li>
                                        <a href="#" title="facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="google-plus">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="linkedin">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="pinterest">
                                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="rss">
                                            <i class="fa fa-rss" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="vimeo">
                                            <i class="fa fa-vimeo" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>© 2018 Thane Varta Designed by Konnect Diginet. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Area End Here -->
            <style type="text/css">
                .img-footer{
                    height:73px; width:100px; 
                }
            </style>