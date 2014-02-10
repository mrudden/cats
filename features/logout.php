<?php session_destroy(); ?>
<p>You are now logged out.</p>
<?php
	if ($_SESSION['loggedin'] == 1) {
		print('<a href="index.php">Click here to return home!</a>');
	}
?>