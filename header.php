 <header>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

                <div id="header-layout2" class="header-style7">
                    <div class="header-top-bar">
                        <div class="top-bar-top bg-primarytextcolor border-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <ul class="news-info-list text-center--md">
                                            <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>Thane</li>
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span></li>
                                            <li>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>Last Update 11.30 am</li>
                                            <li>
                                                <i class="fa fa-cloud" aria-hidden="true"></i>29&#8451; Thane , Mumbai</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 d-none d-lg-block">
                                        <ul class="header-social">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu-area bg-body border-bottom" id="sticker">
                        <div class="container">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-lg-2 col-md-2 d-none d-lg-block">
                                    <div class="logo-area">
                                        <a href="index-2.html" class="img-fluid">
                                            <img src="img/logo.jpg" alt="logo" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 d-none d-lg-block position-static min-height-none">
                                    <div class="ne-main-menu">
                                        <nav id="dropdown">
                                            <ul>
                                                <li >
                                                    <a href="index/"><b>मुखपृष्ठ</b></a>
                                                </li>
                                                <?php list($category) = exc_qry('select * from news_category where status = 0 and parent_id = 0 order by id ');
                                                for ($i=0; $i < count($category); $i++) { 
                                                 ?>
                                                <li>
                                                    <a href="category/<?php echo $category[$i]['id'].'/'.$category[$i]['category']; ?>/"><b><?php echo $category[$i]['category']; ?></b></a>
                                                       <?php list($sub_category) = exc_qry('select * from news_category where status = 0 and parent_id = '.$category[$i]['id'].' order by id ');
                                                   if(count($sub_category)>0){ ?>
                                                     <ul class="ne-dropdown-menu">
                                                        <?php  for ($a=0; $a < count($sub_category); $a++) { ?>
                                                        <li>
                                                            <a href="category/<?php echo $sub_category[$a]['id'].'/'.$sub_category[$a]['category']; ?>/"><b><?php echo $sub_category[$a]['category']; ?></b></a>
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                </li>
                                                <?php } ?>
                                                <li >
                                                    <a href="contact/"><b>संपर्क</b></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-right position-static">
                                    <div class="header-action-item on-mobile-fixed">
                                        <ul>
                                            <li>
                                                <form id="top-search-form" class="header-search-dark">
                                                    <input type="text" class="search-input" placeholder="Search...." required="" style="display: none;">
                                                    <button class="search-button">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <!-- <li class="d-none d-sm-block d-md-block d-lg-none">
                                                <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-user" aria-hidden="true"></i>Sign in
                                                </button>
                                            </li> -->
                                            <li>
                                                <div id="side-menu-trigger" class="offcanvas-menu-btn offcanvas-btn-repoint">
                                                    <a href="#" class="menu-bar">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                    <a href="#" class="menu-times close">
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Area End Here -->