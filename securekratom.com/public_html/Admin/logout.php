<?php
session_start();
if (isset($_SESSION['AdminloggedIn'])) {
	// session_destroy();
	unset($_SESSION['AdminloggedIn']);

	header("Location:adminlogin/adminlogin.php");
}

?>