<?php
	session_start();
	if ( $_SESSION['isadmin'] == 1) {
		$navLinks = array(
			'logout' => 'Log Out',
			'mycats' => 'View my Cats!',
			'findcat' => 'Find a Cat!',
			'newcat' => 'Add a Cat!',
			'admin' => 'Admin'
		);
	} else if( $_SESSION['loggedin'] == 1) {
		$navLinks = array(
			'logout' => 'Log Out',
			'mycats' => 'View my Cats!',
			'findcat' => 'Find a Cat!',
			'newcat' => 'Add a Cat!'
		);
	} else {
		$navLinks = array(
			'login' => 'Log In',
			'register' => 'Register'
		);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cats!</title>
		<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"  type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet" type="text/css">
		<link href="style/cats.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<a href="index.php"><h1 class="title">Cats</h1></a>
				<div class="navigation">
					<ul>
						<?php
							foreach ($navLinks as $filename => $linkText)
							print('<li><a href="index.php?section='.$filename.'">'.$linkText.'</a></li>');
						?>
					</ul>
				</div>
			</div>
			<div class="content">
				<?php
				// extract section key from URL query string
				$filename = $_GET['section'];
				if ( ! isset($filename)) {
					$filename = 'home';
					include("features/${filename}.php");
				}
				if (array_key_exists($filename, $navLinks)) {
   				include("features/${filename}.php");
   				}
			?>
			</div>
		</div>
	</body>
</html>