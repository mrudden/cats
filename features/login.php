<h2>Log In!</h2>
<form action="index.php?section=login" method="post">
	<table>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td><input type="submit" value="Log in!" /></td>
		</tr>
	</table>
</form>
<?php
	if (!$_POST[email] && !$_POST[password]) {
		print("<p>Please enter your credentials to log in!</p>");
	} else {
		$connection = mysql_connect("localhost",  "user", "password");
		if(!$connection) {
			die('Could not connect: ' . mysql_error());
		}
		
		$email = mysql_real_escape_string($_POST[email]);
		$password = md5($_POST[password]);

		mysql_select_db("mrudnet_cats", $connection);
		
		$sql = "SELECT email, password FROM mrudnet_cats.users WHERE email='$email' AND password='$password'";
		
		if(!($result = mysql_query($sql, $connection))) {
			die('Error: ' . mysql_error());
		}
		
		if ( mysql_num_rows($result) == 1 ) {
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $email;
			if ($email == "michael.rudden1@marist.edu") {
				$_SESSION['isadmin'] = true;
			} else {
				$_SESSION['isadmin'] = false;
			}
			print("<p>You are now logged in!</p>");
		} else {
			print("<p>That login is not valid.</p>");
		}
		
		mysql_close($connection);
	}
	
	if ($_SESSION['loggedin'] == 1) {
		print('<a href="index.php">Click here to return and access our features!</a>');
	}
?>