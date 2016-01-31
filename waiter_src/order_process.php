<?php 
session_start();
include('../function/isSecure.php');
include ('../config/config.php');
$id = $_GET['id'];
if (isset($_POST['order'])) {
	$table_id = $_POST['table'];
	$qty = $_POST['qty'];

	if ($table_id == '' || $qty == '') {
		echo '<script>alert("Table or Quantity cannot be empty");window.location="../waiter";</script>';
	} else {
		$query = "SELECT menu_price FROM menus WHERE menu_id = '$id'";
		$sql = mysql_query($query);
		$data = mysql_fetch_array($sql);

		$price = $data['menu_price'];
		$empId = $_SESSION['waiter'];

		$total = $qty * $price;

		$insert_query = mysql_query("INSERT INTO orders (employee_id, table_id, menu_id, qty) VALUES ('$empId', '$table_id', '$id', '$qty')");

		if ($insert_query) {
			echo '<script>alert("Order Success");window.location="../waiter";</script>';
		} else {
			echo mysql_errno();
			die();
		}
	}
}
?>