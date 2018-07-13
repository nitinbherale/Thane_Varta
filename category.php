<?php include 'connect.php'; 
$uri = $_SERVER['REQUEST_URI'];
$url_array = explode('/', $uri);
$cat_id = $url_array[3]; 
$Pg =  $url_array[5];
$date = $url_array[6];
//echo $date;
$cat_new_qry = "select * from news where status = 0 and (category = $cat_id or sub_category = $cat_id) and post_date like '%$date%' order by post_date";
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
               <?php include("header.php"); ?>
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
           <?php include 'menu.php'; ?>
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
