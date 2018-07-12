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
                               <?php list($tags) = exc_qry('select tags from news where status = 0 order by rand()'); ?>
            <ul class="sidebar-tags">
               <?php  $news_tag=array(); 
               for ($t=0; $t < count($tags); $t++) { 
                    $i_tag = $tags[$t]['tags'];
                    $list = array_map('trim',explode(",",$i_tag));
                    for($i=0;$i<count($list);$i++){
                    array_push($news_tag,$list[$i]);
                    }
                } ?>

                <?php for ($r=0; $r < 9 ; $r++) { ?>
                    <li>
                    <a href="tag/<?php echo $news_tag[$r]; ?>/"><?php echo $news_tag[$r]; ?></a>
                </li>
                
                <?php } ?>
                
            </ul>
                            </div>
                        </div>