<?php
	$email = $_SESSION['email'];
	// Connect to MySQL
	if(!($database = mysql_connect("localhost", "user", "password")))
		die("<p>Could not connect to the database.</p></body></html>");

	// Open the cats database
	if(!mysql_select_db("mrudnet_cats", $database))
		die("<p>Could not open cats database.</p></body></html>");

	// This will show all data in cats
	$query = "SELECT name, ears, earspattern, face, facepattern, torso, torsopattern, frontpaws, frontpawspattern, backpaws, backpawspattern, tail, tailpattern, action, musicalinstrument FROM mrudnet_cats.cats WHERE email='$email' ORDER BY id";
	
	// Query contacts database
	if (!($result = mysql_query($query, $database)))
	{
		print("<p>Could not execute query! <br />");
		die(mysql_error() . "</p>");
	}
	
	print("<h2>My Cats!</h2>");
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
	print("<p>You have entered data about ". $counter . " cat(s).</p>");
	
	mysql_close($database);
?>