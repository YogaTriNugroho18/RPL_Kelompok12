<?php 
session_start();
if (! isset($_SESSION['waiter'])) {
    header('Location: home');
}
include('config/config.php');
include('function/isSecure.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>RestoBroto | Waiter</title>

	<!-- Meta Tags -->
	<?php require('head/meta.php'); ?>

	<!-- Link Tags -->
	<?php require('head/link.php'); ?>

	<script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<div class="bg-overlay"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<div class="sidebar-menu">

                <div class="logo-wrapper">
                    <h1 class="logo">
                        <a href="waiter"><img src="assets/images/logos.png" alt="Circle Template">
                        <span>Great Taste Great Life</span></a>
                    </h1>
                </div> <!-- /.logo-wrapper -->
                
                <div class="menu-wrapper">
                    <ul class="menu">
                        <li><a class="homebutton" href="#" >Home</a></li>
                        <li><a class="show-4" href="#">Orders</a></li>
                        <li><a class="show-2" href="#">Tables</a></li>
                        <li><a class="show-3" href="#">Menu</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul> <!-- /.menu -->
                    <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                </div> <!-- /.menu-wrapper -->
            </div> <!-- /.sidebar-menu -->
		</div> <!-- /.col-md-4 -->

		<div class="col-md-8 col-sm-12">
			<div id="menu-container">
                <?php require('waiter_src/order.php'); ?>

                <?php require('waiter_src/menu_category.php'); ?>

                <?php require('waiter_src/tables.php'); ?>
			</div>
		</div>
	</div>	
</div>
<!-- Footer -->
<?php require('includes/footer.php'); ?>

<!-- Script Sources -->
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
 <script>
    $('#delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
</body>
</html>