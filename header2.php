<header>
                <div id="header-layout1" class="header-style1">
                    <div class="main-menu-area bg-primarytextcolor header-menu-fixed" id="sticker">
                        <div class="container">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="logo-area">
                                        <a href="index.php">
                                            <img src="img/logo.jpg" alt="logo" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 position-static min-height-none">
                                    <div class="ne-main-menu">
                                        <nav id="dropdown" style="display: block;">
                                            <ul>
                                                <li>
                                                    <a href="index2/">Home</a>
                                                </li>
                                                 <?php list($category) = exc_qry('select * from news_category where status = 0 and parent_id = 0 order by id desc');
                                                for ($i=0; $i < count($category); $i++) { 
                                                 ?>
                                                <li>
                                                    <a href="category/<?php echo $category[$i]['id'].'/'.$category[$i]['category']; ?>"><b><?php echo $category[$i]['category']; ?></b></a>
                                                    <?php list($sub_category) = exc_qry('select * from news_category where status = 0 and parent_id = '.$category[$i]['id'].' order by id desc');
                                                   if(count($sub_category)>0){ ?>
                                                     <ul class="ne-dropdown-menu">
                                                        <?php  for ($a=0; $a < count($sub_category); $a++) { ?>
                                                        <li>
                                                            <a href="category/<?php echo $sub_category[$a]['id'].'/'.$sub_category[$a]['category']; ?>"><b><?php echo $sub_category[$a]['category']; ?></b></a>
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 text-right position-static">
                                    <div class="header-action-item">
                                        <ul>
                                            <li>
                                                <form id="top-search-form" class="header-search-light">
                                                    <input type="text" class="search-input" placeholder="Search...." required="" style="display: none;">
                                                    <button class="search-button">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <!-- <li>
                                                <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-user" aria-hidden="true"></i>Sign in
                                                </button>
                                            </li> -->
                                            <li>
                                                <div id="side-menu-trigger" class="offcanvas-menu-btn">
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