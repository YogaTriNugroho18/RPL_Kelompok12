<?php 
include('../config/config.php');
$id = $_GET['id'];

$query = "DELETE FROM ingredients WHERE ingredient_id = '$id'";
$sql = mysql_query($query);
if ($sql) {
	echo '<script>alert("Data successfully deleted")</script>';
	header("location: ../pantry.php");
}
?>
