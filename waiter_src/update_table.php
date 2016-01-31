<?php 
include('../config/config.php');
$id = $_GET['id'];

$query = "SELECT status FROM tables WHERE table_id = '$id'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);

$available = $data['status'];

if ($available == '0') {
	$update_query = "UPDATE tables SET status = '1' WHERE table_id = '$id'";
} elseif ($available == '1') {
	$update_query = "UPDATE tables SET status = '0' WHERE table_id = '$id'";
}

$update = mysql_query($update_query);
if ($update) {
	echo '<script>window.location="../waiter";</script>';
} else {
	echo mysql_errno();
}
?>