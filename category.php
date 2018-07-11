<?php include 'connect.php'; 
$uri = $_SERVER['REQUEST_URI'];
$url_array = explode('/', $uri);
$cat_id = $url_array[3]; 
?>
<!doctype html>
<html class="no-js" lang="">

<head>
        <base href="http://localhost/thane_v/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Thane Varta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/main.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
        <!-- Main Menu CSS -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="css/select2.min.css">
        <!-- Magnific CSS -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="css/hover-min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- For IE -->
        <link rel="stylesheet" type="text/css" href="css/ie-only.css" />
        <!-- Modernizr Js -->
        <script src="js/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an 
        <strong>outdated</strong> browser. Please 
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper">
            <!-- Header Area Start Here -->
               <?php include("header.php") ?>
            <!-- News Feed Area Start Here -->
            
             <?php include("cat_section.php") ?>
             
            <!-- Footer Area Start Here -->
             <?php include("footer.php") ?>
            <!-- Footer Area End Here -->
            <!-- Modal Start-->
            <!-- <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="title-login-form">Login</div>
                        </div>
                        <div class="modal-body">
                            <div class="login-form">
                                <form>
                                    <label>Username or email address *</label>
                                    <input type="text" placeholder="Name or E-mail" />
                                    <label>Password *</label>
                                    <input type="password" placeholder="Password" />
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox" type="checkbox" checked>
                                        <label for="checkbox">Remember Me</label>
                                    </div>
                                    <button type="submit" value="Login">Login</button>
                                    <button class="form-cancel" type="submit" value="">Cancel</button>
                                    <label class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End--> -->
            <!-- Offcanvas Menu Start -->
            <div id="offcanvas-body-wrapper" class="offcanvas-body-wrapper">
                <div id="offcanvas-nav-close" class="offcanvas-nav-close offcanvas-menu-btn">
                    <a href="#" class="menu-times re-point">
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="offcanvas-main-body">
                    <ul id="accordion" class="offcanvas-nav panel-group">
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-home" aria-hidden="true"></i>Home Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseOne" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="#">Home 1</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="author-post.html">
                                <i class="fa fa-user" aria-hidden="true"></i>Author Post Page</a>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>Post Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseTwo" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="#">Post Style 1</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>News Details Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseThree" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="#">News Details 1</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="archive.html">
                                <i class="fa fa-archive" aria-hidden="true"></i>Archive Page</a>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>Gallery Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseFour" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="#">Gallery Style 1</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="404.html">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>404 Error Page</a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <i class="fa fa-phone" aria-hidden="true"></i>Contact Page</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Offcanvas Menu End -->
        </div>
        <!-- Wrapper End -->
        <!-- jquery-->
        <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Plugins js -->
        <script src="js/plugins.js" type="text/javascript"></script>
        <!-- Popper js -->
        <script src="js/popper.js" type="text/javascript"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- WOW JS -->
        <script src="js/wow.min.js"></script>
        <!-- Owl Cauosel JS -->
        <script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
        <!-- Meanmenu Js -->
        <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
        <!-- Srollup js -->
        <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
        <!-- jquery.counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- Select2 Js -->
        <script src="js/select2.min.js" type="text/javascript"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Ticker Js -->
        <script src="js/ticker.js" type="text/javascript"></script>
        <!-- Custom Js -->
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
