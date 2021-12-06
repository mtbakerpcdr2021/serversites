<meta name="robots" content="noindex">
<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
	// session_destroy();
	unset($_SESSION['loggedIn']);

	header("Location:index.php");

}

?>
