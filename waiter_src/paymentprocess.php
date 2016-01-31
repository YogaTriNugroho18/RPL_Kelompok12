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
	$jumlah = mysql_query("SELECT SUM(menu_price*qty) AS subtotal FROM menus JOIN orders USING (menu_id) WHERE table_id = '$table_id'");
	$menus = mysql_query("SELECT menu_id, menu_price, menu_discount, menu_name FROM menus JOIN orders USING (menu_id) WHERE table_id = '$table_id'");
	$amount = mysql_fetch_array($jumlah);
	$hasil = mysql_fetch_array($menus);
	$disc = ($hasil['menu_discount'] / 100 * $hasil['menu_price']);
	$tax = 0.1 * $amount['subtotal'];
	$total = $amount['subtotal'] + $tax - $disc;

	while ($data = mysql_fetch_array($menus)) {
		$datamenu[] = $data['menu_name'];
		$imp = implode(',', $datamenu);
	}

	$query = "INSERT INTO payments (employee_id, table_id, menu, subtotal, total, datee) VALUES ('" . $_SESSION['waiter'] . "', '$table_id', '$imp', '" . $amount['subtotal'] . "', '$total', '" . date('Y-m-d') . "')";
	$sql = mysql_query($query);

	if ($sql) {
		$update = mysql_query("UPDATE orders SET deleted = '1' WHERE table_id = '$table_id'");
		if ($update) {
			mysql_query("DELETE FROM orders WHERE table_id = '$table_id'");
		}
		echo '<script>alert("Payment sent");window.location="../waiter";</script>';
	}
}
?>