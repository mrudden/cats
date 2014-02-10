<?php
	set_include_path('/home/mrudnet/php');
	require_once 'XML/Query2XML.php';
	require_once 'MDB2.php';
	
	// Connect to MySQL
	if(!($database = mysql_connect("localhost", "user", "password")))
		die("<p>Could not connect to the database.</p></body></html>");

	// Open the cats database
	if(!mysql_select_db("mrudnet_cats", $database))
		die("<p>Could not open cats database.</p></body></html>");
		
	$selectedProperty = mysql_real_escape_string($_POST[selectedproperty]);
	$searchTerm = mysql_real_escape_string($_POST[searchterm]);
	
	$query2xml = XML_Query2XML::factory(MDB2::factory('mysql://user:password@localhost/mrudnet_cats'));
	
	// This is where the query is constructed
	if ($_POST[searchtype] == "equals") {
		$query = "SELECT * FROM cats WHERE $selectedProperty='$searchTerm' ORDER BY id";
	} else if ($_POST[searchtype] == "contains") {
		$query = "SELECT * FROM cats WHERE $selectedProperty LIKE '%$searchTerm%' ORDER BY id";
	} else {
		echo "This should never happen.";
	}

	$xml = $query2xml->getXML(
		$query,
		array(
			'rootTag' => 'cats',
			'idColumn' => 'id',
			'rowTag' => 'cat',
			'elements' => array(
				'name',
				'physicalattributes' => array(
					'rootTag' => 'physicalattributes',
					'idColumn' => false,
					'rowTag' => '__tables',
					'elements' => array(
						'head' => array(
							'rootTag' => 'head',
							'idColumn' => false,
							'rowTag' => '__tables',
							'elements' => array(
								'ears' => array(
									'value' => 'ears',
									'attributes' => array(
										'colorpattern' => 'earspattern'
									)
								),
								'face' => array(
									'value' => 'face',
									'attributes' => array(
										'colorpattern' => 'facepattern'
									)
								)							
							)
						),
						'body' => array(
							'rootTag' => 'body',
							'idColumn' => false,
							'rowTag' => '__tables',
							'elements' => array(
								'torso' => array(
									'value' => 'torso',
									'attributes' => array(
										'colorpattern' => 'torsopattern'
									)
								),
								'frontpaws' => array(
									'value' => 'frontpaws',
									'attributes' => array(
										'colorpattern' => 'frontpawspattern'
									)
								),
								'backpaws' => array(
									'value' => 'backpaws',
									'attributes' => array(
										'colorpattern' => 'backpawspattern'
									)
								),
								'tail' => array(
									'value' => 'tail',
									'attributes' => array(
										'colorpattern' => 'tailpattern'
									)
								)
							)
						)
					)
				),
				'activity' => array(
					'rootTag' => 'activity',
					'idColumn' => false,
					'rowTag' => '__tables',
					'elements' => array(
						'action',
						'musicalinstrument'							
						)
					)
				)
			)
	);
	header('Content-Type: application/xml');

	$xmldeclaration = '<?xml version="1.0" encoding="UTF-8"?>';
	$doctype = '<!DOCTYPE cat SYSTEM "http://lskflrj.linuxclass.marist.edu/cats/catml/catml.dtd">';
	$styletag = '<?xml-stylesheet href="http://mrud.net/cats/catml/catml.xsl" type="text/xsl"?>';
	$prolog = "${xmldeclaration}\n${styletag}\n${doctype}";
	
	$xml->formatOutput = true;
	
	print str_replace('<cats>', '<cats xmlns="http://foxweb.marist.edu/users/kflrj/catml">',
						preg_replace('/<\?xml .*?>/', $prolog, $xml->saveXML(), 1));
?>