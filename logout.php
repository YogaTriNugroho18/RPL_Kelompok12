<?php 
session_start();
if (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}

if (isset($_SESSION['waiter'])) {
	unset($_SESSION['waiter']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}

if (isset($_SESSION['chef'])) {
	unset($_SESSION['chef']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}

if (isset($_SESSION['pantry'])) {
	unset($_SESSION['pantry']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}

if (isset($_SESSION['cs'])) {
	unset($_SESSION['cs']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}

if (isset($_SESSION['cashier'])) {
	unset($_SESSION['cashier']);
	session_destroy();
	echo '<script>window.location="home.php";</script>';
}
?>
