<?php
include('config/config.php');
include('function/isSecure.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title>RestoBroto | Home</title>
	
	<!-- Meta Tags -->
	<?php require('head/meta.php'); ?>

	<!-- Link Tags -->
	<?php require('head/link.php'); ?>

    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
	<!-- templatemo 410 circle -->
</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div class="bg-overlay"></div>

	<!-- Main Menu -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 col-sm-12">
                <div class="sidebar-menu">    
                    <div class="logo-wrapper">
                        <h1 class="logo">
                            <a href="home"><img src="assets/images/logos.png" alt="Circle Template">
                            <span>Great Taste Great Life</span></a>
                        </h1>
                    </div> <!-- /.logo-wrapper -->
                    
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <li><a class="homebutton" href="home" >Home</a></li>
                            <li><a class="show-1" href="#">About</a></li>
                            <li><a class="show-3" href="#">Login</a></li>
                        </ul> <!-- /.menu -->
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                    </div> <!-- /.menu-wrapper -->
                </div> <!-- /.sidebar-menu -->
            </div> <!-- /.col-md-4 -->

            <div class="col-md-8 col-sm-12">
                <!-- About -->
                <div id="menu-container">
                <?php require('includes/about.php'); ?>
				
				<!-- Login -->
                <?php require('includes/login.php'); ?> 

                </div> <!-- /#menu-container -->

            </div> <!-- /.col-md-8 -->

        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
    
    <?php require('includes/footer.php'); ?>

    <?php require('body/script.php'); ?>

    <script type="text/javascript">
			jQuery(function ($) {
                $.supersized({
                    // Functionality
                    slide_interval: 3000, // Length between transitions
                    transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed: 700, // Speed of transition
                    // Components                           
                    slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    slides: [ // Slideshow Images
                        {
                            image: 'assets/images/templatemo-slide-1.jpg'
                        }, {
                            image: 'assets/images/templatemo-slide-2.jpg'
                        }, {
                            image: 'assets/images/templatemo-slide-3.jpg'
                        }, {
                            image: 'assets/images/templatemo-slide-4.jpg'
                        }
                    ]
                });
            });
            
    </script>
    
    <!-- Google Map Init-->
    <script type="text/javascript">
       function templatemo_map() {
            $('.google-map').gmap3({
                marker:{
                    address: '16.8496189,96.1288854' 
                },
                    map:{
                    options:{
                    zoom: 15,
                    scrollwheel: false,
                    streetViewControl : true
                    }
                }
            });
        }
    </script>
</body>
</html>