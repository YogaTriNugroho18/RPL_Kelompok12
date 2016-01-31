<?php 
session_start();
include ('../config/config.php');
$id = $_GET['id'];
if (isset($_POST['paid'])) {
	$query = mysql_query("UPDATE payments SET status = '1' WHERE payment_id = '$id'");
	if ($query) {
		echo '<script>alert("Order Success");window.location="../cashier";</script>';
	} else {
		echo mysql_errno();
		die();
	}
}
?>