<?php 
session_start();
if (! isset($_SESSION['cs'])) {
    echo '<script>window.location="home.php";</script>';
}
include('config/config.php');
include('function/isSecure.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>RestoBroto | Customer Service</title>

	<!-- Meta Tags -->
    <?php require('head/meta.php'); ?>

    <!-- Link Tags -->
    <?php require('head/link.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/cs.css">

    <script src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div class="bg-overlay"></div>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-4 col-sm-12">
                <div class="sidebar-menu">
                    
                    <div class="logo-wrapper">
                        <h1 class="logo">
                            <a href="customerservice"><img src="assets/images/logos.png" alt="Circle Template">
                            <span>Great Taste Great Life</span></a>
                        </h1>
                    </div> <!-- /.logo-wrapper -->
                    
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <li><a class="homebutton" href="customerservice" >Home</a></li>
                            <li><a class="show-1" href="#">Processing Data</a></li>
                            <li><a class="show-3" href="#">Kuisioner</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul> <!-- /.menu -->
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                    </div> <!-- /.menu-wrapper -->
                </div> <!-- /.sidebar-menu -->
            </div> <!-- /.col-md-4 -->

            <div class="col-md-8 col-sm-12">
            	<div id="menu-container">
            		<?php require('cs_src/processingdata.php'); ?>

            		<?php require('cs_src/Kuisioner.php'); ?>
            	</div>
            </div>

    	</div>
    </div>

<?php require('body/script.php'); ?>
<script src="assets/js/classie.js"></script>
<script src="assets/js/stepsForm.js"></script>

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
<script>
    var theForm = document.getElementById( 'theForm' );

    new stepsForm( theForm, {
        onSubmit : function( form ) {
            // hide form
            classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

            /*
            form.submit()
            or
            AJAX request (maybe show loading indicator while we don't have an answer..)
            */

            // let's just simulate something...
            var messageEl = theForm.querySelector( '.final-message' );
            messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
            classie.addClass( messageEl, 'show' );
        }
    } );
</script>
</body>
</html>
