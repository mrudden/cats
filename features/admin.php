<h2>Administration!</h2>
<form action="index.php?section=admin" method="post">
	<table>
		<tr>
			<td>Clear Test Cats</td>
			<td><input type="submit" name="cleartestcats" value="Clear!" /></td>
		</tr>
		<tr>
			<td>Clear Demo Users</td>
			<td><input type="submit" name="cleardemousers" value="Clear!" /></td>
		</tr>
		<tr>
			<td>View All Cats</td>
			<td><input type="submit" name="viewallcats" value="View!" /></td>
		</tr>
		<tr>
			<td>View All Users</td>
			<td><input type="submit" name="viewallusers" value="View!" /></td>
		</tr>
	</table>
</form>
<?php
	if ($_POST['cleartestcats'] || $_POST['cleardemousers'] || $_POST['viewallcats'] || $_POST['viewallusers']) {
		$connection = mysql_connect("localhost",  "user", "password");
		if(!$connection) {
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("mrudnet_cats", $connection);
		
		if ($_POST['cleartestcats']) {
			$sql = "DELETE FROM mrudnet_cats.cats WHERE name='test'";
			print("<p>Test entries have been cleared!</p>");
		} else if ($_POST['cleardemousers']) {
			$sql = "DELETE FROM mrudnet_cats.users WHERE email='demo'";
			print("<p>Demo users have been cleared!</p>");
		} else if ($_POST['viewallcats']) {
			$sql = "SELECT * FROM mrudnet_cats.cats ORDER BY id";
			print("<p>All cats:</p>");
		} else if ($_POST['viewallusers']) {
			$sql = "SELECT email FROM mrudnet_cats.users ORDER BY email";
			print("<p>All users:</p>");
		}
		
		if(!($result = mysql_query($sql, $connection))) {
			die('Error: ' . mysql_error());
		}
		
		if ($_POST['viewallcats'] || $_POST['viewallusers']) {
			print('<table class="results">');
			while ($property = mysql_fetch_field($result)) {
				print('<th class="results">' . $property->name . '</th>');
			}
			for ($counter = 0; $row = mysql_fetch_row($result); $counter++)	{
					// Build table row to display results
					print('<tr class="results">');
					foreach ($row as $key => $value)
						print('<td class="results">' . $value . '</td>');
					print("</tr>");
				}
			print("</table>");
			print("<p>Your action displayed ". $counter . " total entries.</p>");
		}
				
		mysql_close($connection);
	}
?>