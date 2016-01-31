<?php 
session_start();
if (! isset($_SESSION['admin'])) {
	echo '<script>window.location="home";</script>';
}
include('config/config.php');
include('function/isSecure.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>RestoBroto | Admin</title>

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
		<div class="col-md-4">
			<div class="sidebar-menu">

                <div class="logo-wrapper">
                    <h1 class="logo">
                        <a href="admin"><img src="assets/images/logos.png" alt="Circle Template">
                        <span>Great Taste Great Life</span></a>
                    </h1>
                </div> <!-- /.logo-wrapper -->
                
                <div class="menu-wrapper">
                    <ul class="menu">
                        <li><a class="homebutton" href="admin" >Home</a></li>
                        <li><a class="show-1" href="#">Processing Data</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul> <!-- /.menu -->
                    <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                </div> <!-- /.menu-wrapper -->
            </div> <!-- /.sidebar-menu -->
		</div> <!-- /.col-md-4 -->

		<div class="col-md-8 col-sm-12">
			<div id="menu-container">
			
			<!-- Processing Data -->
			<?php require('admin_src/processingdata.php'); ?>
			
			</div>
		</div>
	</div>	
</div>
<!-- Footer -->
<?php require('includes/footer.php'); ?>

<!-- Script Sources -->
<?php require('body/script.php'); ?>
<!-- Data Tables -->
<script src="assets/js/jquery.datatables.min.js"></script>
<script src="assets/js/datatables.bootstrap.min.js"></script>
<script src="assets/js/nicescroll.js"></script>

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
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-employee').dataTable({
        "ordering": false
    });
  });
</script>
<script>
    $(document).on("click", ".open-EditEmp", function () {
     var empId = $(this).data('id');
     var empName = $(this).data('name');
     var empType = $(this).data('type');
     $(".modal-body #empId").val( empId );
     $(".modal-body #empName").val( empName );
     $(".modal-body #empType").val( empType );
});
</script>
<script>
    $('#delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
</body>
</html>