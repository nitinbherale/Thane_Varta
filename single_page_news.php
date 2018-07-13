<?php include 'connect.php';
$uri = $_SERVER['REQUEST_URI'];
$url_array = explode('/', $uri);
$newz_id = $url_array[3]; 
//echo $newz_id;
 $news_qry = "select * from news where status = 0 and id = $newz_id";  
// echo $news_qry;
 list($news_single) = exc_qry($news_qry);
 //echo count($news_single);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <base href="http://localhost/thane_v/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Thane Varta</title>
        <meta name="description" content="<?php echo $news_single[0]['meta_description']; ?>">
        <meta name="keywords" content="<?php echo $news_single[0]['meta_tag']; ?>">
        <meta name="author" content="<?php echo $news_single[0]['author']; ?>">
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
        <!-- Nivo Slider CSS-->
        <link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" />
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




     <div id="wrapper">

     <?php include("header.php") ?>
      <?php include("top_scroll_news_section.php") ?>
       <?php include("single_body_cont.php") ?>
     <?php include("footer.php") ?>


      <!-- Offcanvas Menu Start -->
           <?php include 'menu.php'; ?>
            <!-- Offcanvas Menu End -->

    </div><!--Wrapper End Here-->

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
        <!-- Nivo slider js -->
        <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="vendor/slider/home.js" type="text/javascript"></script>
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