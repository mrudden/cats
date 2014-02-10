<h2>Search for cats!</h2>
<p>Return results on this page...</p>
<form action="index.php?section=findcat" method="post">
	Search for cats on this page where Field:
	<select name="selectedproperty">
		<option value="name">Name</option>
		<option value="ears">Ears</option>
		<option value="face">Face</option>
		<option value="torso">Torso</option>
		<option value="frontpaws">Front Paws</option>
		<option value="backpaws">Back Paws</option>
		<option value="tail">Tail</option>
		<option value="action">Action</option>
		<option value="musicalinstrument">Musical Instrument</option>
	</select>
	<select name="searchtype">
		<option value="contains">contains</option>
		<option value="equals">is equal to</option>
	</select>
	Term to Search:
	<input type="text" name="searchterm" />
	<input type="submit" value="Search!" />
</form>
<br />
<p>...or return results as XML</p>
<br />
<form action="features/getxml.php" method="post">
	Return XML for cats where Field:
	<select name="selectedproperty">
		<option value="name">Name</option>
		<option value="ears">Ears</option>
		<option value="face">Face</option>
		<option value="torso">Torso</option>
		<option value="frontpaws">Front Paws</option>
		<option value="backpaws">Back Paws</option>
		<option value="tail">Tail</option>
		<option value="action">Action</option>
		<option value="musicalinstrument">Musical Instrument</option>
	</select>
	<select name="searchtype">
		<option value="contains">contains</option>
		<option value="equals">is equal to</option>
	</select>
	Term to Search:
	<input type="text" name="searchterm" />
	<input type="submit" value="Get XML!" />
</form>
<?php
	if (!$_POST['searchterm']) {
		print("<p>Please enter a search term!</p>");
	} else {
		
		// Connect to MySQL
		if(!($database = mysql_connect("localhost", "user", "password")))
			die("<p>Could not connect to the database.</p>");
	
		// Open the cats database
		if(!mysql_select_db("mrudnet_cats", $database))
			die("<p>Could not open cats database.</p>");
	
		$selectedProperty = mysql_real_escape_string($_POST[selectedproperty]);
		$searchTerm = mysql_real_escape_string($_POST[searchterm]);	
	
		// This is where the query is constructed
		if ($_POST[searchtype] == "equals") {
			$query = "SELECT name, ears, earspattern, face, facepattern, torso, torsopattern, frontpaws, frontpawspattern, backpaws, backpawspattern, tail, tailpattern, action, musicalinstrument FROM cats WHERE $selectedProperty='$searchTerm' ORDER BY id";
		} else if ($_POST[searchtype] == "contains") {
			$query = "SELECT name, ears, earspattern, face, facepattern, torso, torsopattern, frontpaws, frontpawspattern, backpaws, backpawspattern, tail, tailpattern, action, musicalinstrument FROM cats WHERE $selectedProperty LIKE '%$searchTerm%' ORDER BY id";
		} else {
			print("This should never happen.");
		}
	
		// Query cats database
		if (!($result = mysql_query($query, $database))) {
			print( "<p>Could not execute query! <br />");
			die( mysql_error() . "</p>" );
		}
		
		print("<p>Search results:</p>");
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
		print("<p>Your search returned ". $counter . " result(s).</p>");
		mysql_close($database);
	}
?>