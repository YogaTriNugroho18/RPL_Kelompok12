<?php 
session_start();
include('../function/isSecure.php');
include ('../config/config.php');
$id = $_GET['id'];
$qty = $_GET['qty'];
$table_id = $_GET['table_id'];
$price = $_GET['price'];

$total_price = $price * $qty;

if (isset($_POST['send'])) {
	$query = "INSERT INTO payments (employee_id, order_id, table_id, total_price) VALUES ('". $_SESSION['waiter'] . "', '$id', '$table_id', '$total_price')";
	$sql = mysql_query($query);

	if ($sql) {
		$update = mysql_query("UPDATE orders SET deleted = '1' WHERE order_id = '$id'");
		echo '<script>alert("Payment sent");window.location="../waiter";</script>';
	}
}
?>