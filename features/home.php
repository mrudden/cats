<h2>Home</h2>
<?php
	if ($_SESSION['loggedin'] == 1) {
		print("<p>You are currently logged in as ".$_SESSION['email'].".</p>");
		if ($_SESSION['isadmin'] == 1) {
			print("<p>Your account currently has administrative privileges.</p>");
		}
		print("<p>Use the navigation above to access available features!</p>");
	} else {
		print("<p>This website is for keeping track of cats!</p>");
		print("<p>It is user-authenticated, so register and log in to access the features!</p>");
	}
?>

<style type="text/css"> 
	body {
		background-image: url('style/3kcm.jpg');
	}
</style>