<?php 
session_start();
include ('../config/config.php');
$id = $_GET['id'];

$query = "UPDATE orders SET done = '1' WHERE order_id = '$id'";
$sql = mysql_query($query);

if ($sql) {
	echo '<script>alert("Order done");window.location="../chef";</script>';
} else {
	echo mysql_error();
}

?>