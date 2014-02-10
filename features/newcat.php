<h2>Add a Cat!</h2>
<p>For multiple colors (e.g., tuxedo or calico patterns) please seperate colors with a comma.</p>
<p>Example: "black, white"</p>
<form action="index.php?section=newcat" method="post">
	<table>
		<tr>
			<td>Cat Name:</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>Ears Color:</td>
			<td><input type="text" name="ears" /></td>
		</tr>
		<tr>
			<td>Ears Pattern:</td>
			<td>
				<select name="earspattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Face Color:</td>
			<td><input type="text" name="face" /></td>
		</tr>
		<tr>
			<td>Face Pattern:</td>
			<td>
				<select name="facepattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Torso Color:</td>
			<td><input type="text" name="torso" /></td>
		</tr>
		<tr>
			<td>Torso Pattern:</td>
			<td>
				<select name="torsopattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Front Paws Color:</td>
			<td><input type="text" name="frontpaws" /></td>
		</tr>
		<tr>
			<td>Front Paws Pattern:</td>
			<td>
				<select name="frontpawspattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Back Paws Color:</td>
			<td><input type="text" name="backpaws" /></td>
		</tr>
		<tr>
			<td>Back Paws Pattern:</td>
			<td>
				<select name="backpawspattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tail Color:</td>
			<td><input type="text" name="tail" /></td>
		</tr>
		<tr>
			<td>Tail Pattern:</td>
			<td>
				<select name="tailpattern">
					<option value="solid">Solid</option>
					<option value="stripes">Stripes</option>
					<option value="spots">Spots</option>
					<option value="tuxedo">Tuxedo</option>
					<option value="halfandhalf">Half and Half</option>
					<option value="calico">Calico</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Action of Choice (Optional):</td>
			<td><input type="text" name="action" /></td>
		</tr>
		<tr>
			<td>Musical Instrument of Choice (Optional):</td>
			<td><input type="text" name="musicalinstrument" /></td>
		</tr>
		<tr>
			<td><input type="submit" /></td>
		</tr>
	</table>
</form>
<?php
	if (!$_POST[name] && !$_POST[ears] && !$_POST[face] && !$_POST[torso] && !$_POST[frontpaws] && !$_POST[backpaws] && !$_POST[tail]) {
		print("<p>Please enter the information above to submit a cat!</p>");
	} else {
			$email = $_SESSION['email'];
			$connection = mysql_connect("localhost",  "username", "password");
			if(!$connection) {
				die('Could not connect: ' . mysql_error());
			}
			
			$name = mysql_real_escape_string($_POST[name]);
			$ears= mysql_real_escape_string($_POST[ears]);
			$earsPattern = mysql_real_escape_string($_POST[earspattern]);
			$face = mysql_real_escape_string($_POST[face]);
			$facePattern = mysql_real_escape_string($_POST[facepattern]);
			$torso = mysql_real_escape_string($_POST[torso]);
			$torsoPattern = mysql_real_escape_string($_POST[torsopattern]);
			$frontPaws = mysql_real_escape_string($_POST[frontpaws]);
			$frontPawsPattern = mysql_real_escape_string($_POST[frontpawspattern]);
			$backPaws = mysql_real_escape_string($_POST[backpaws]);
			$backPawsPattern = mysql_real_escape_string($_POST[backpawspattern]);
			$tail = mysql_real_escape_string($_POST[tail]);
			$tailPattern = mysql_real_escape_string($_POST[tailpattern]);
			$action = mysql_real_escape_string($_POST[action]);
			$musicalInstrument = mysql_real_escape_string($_POST[musicalinstrument]);
			
			mysql_select_db("mrudnet_cats", $connection);
			
			$sql = "INSERT INTO mrudnet_cats.cats (name, ears, earspattern, face, facepattern, torso, torsopattern, frontpaws, frontpawspattern, backpaws, backpawspattern, tail, tailpattern, action, musicalinstrument, email) VALUES('$_POST[name]', '$ears', '$earsPattern', '$face', '$facePattern', '$torso', '$torsoPattern', '$frontPaws', '$frontPawsPattern', '$backPaws', '$backPawsPattern', '$tail', '$tailPattern', '$action', '$musicalInstrument', '$email')";
			
			if(!mysql_query($sql, $connection)) {
				die('Error: ' . mysql_error());
			}
			print('<p>Cat successfully added! Click on "View my Cats" to see cats you\'ve added!</p>');
			
			mysql_close($connection);
	}

?>
