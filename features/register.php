<h2>Register!</h2>
<form action="index.php?section=register" method="post">
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
			<td>Confirm Password:</td>
			<td><input type="password" name="confirmpassword" /></td>
		</tr>
		<tr>
			<td><input type="submit" value="Register!" /></td>
		</tr>
	</table>
</form>
<?php
	if (!$_POST[email] && !$_POST[password] && !$_POST[confirmpassword]) {
		print("<p>Please enter the information above to register as a user!</p>");
	} else {
			function confirmPassword( $pass1, $pass2 ) {
				return $pass1 == $pass2;
			}
		
			$connection = mysql_connect("localhost",  "username", "password");
			if(!$connection) {
				die('Could not connect: ' . mysql_error());
			}
			
			$email = mysql_real_escape_string($_POST[email]);
			
			mysql_select_db("mrudnet_cats", $connection);
			
			if (confirmPassword($_POST[password], $_POST[confirmpassword])) {
				$password = md5($_POST[password]);
				$sql = "INSERT INTO mrudnet_cats.users (email, password) VALUES('$email', '$password')";
				
				if(!mysql_query($sql, $connection)) {
					die('Error: ' . mysql_error());
				}
				print("<p>Thank you for registering! Use the link above to log in!</p>");
			} else {
				print("<p>Error: passwords do not match!</p>");	
			}
			
			mysql_close($connection);
	}
?>