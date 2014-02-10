<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:c="http://foxweb.marist.edu/users/kflrj/catml"
xmlns="http://www.w3.org/1999/xhtml">
<xsl:output method="xml" indent="yes" encoding="UTF-8"/>
<xsl:template match="/">
	<html>
		<head>
			<title>Cats in Database (XML)</title>
			<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"  type="text/css" />
			<link href="http://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet" type="text/css" />
			<link href="http://mrud.net/cats/style/cats.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<h1>Results as XML</h1>
			<br />
			<xsl:for-each select="c:cats/c:cat">
				<h2>Cat:</h2>
				<table class="results">
					<tr class="results">
						<th colspan="2" class="results"><h3><xsl:value-of select="c:name"/></h3></th>
					</tr>
					<xsl:for-each select="c:physicalattributes">
						<xsl:for-each select="c:head">							
							<tr class="results">
								<th class="results">Ears</th>
								<td class="results"><xsl:value-of select="c:ears"/></td>	
							</tr>
							<tr class="results">
								<th class="results">Face</th>
								<td class="results"><xsl:value-of select="c:face"/></td>
							</tr>
						</xsl:for-each>
						<xsl:for-each select="c:body">
							<tr class="results">
								<th class="results">Torso</th> 
								<td class="results"><xsl:value-of select="c:torso"/></td>
							</tr>
							<tr class="results">
								<th class="results">Front Paws</th> 
								<td class="results"><xsl:value-of select="c:frontpaws"/></td>
							</tr>
							<tr class="results">
								<th class="results">Back Paws</th>
								<td class="results"><xsl:value-of select="c:backpaws"/></td>
							</tr>
							<tr class="results">
								<th class="results">Tail</th>
								<td class="results"><xsl:value-of select="c:frontpaws"/></td>
							</tr>
						</xsl:for-each>
					</xsl:for-each>
					<xsl:for-each select="c:activity">
						<tr class="results">
							<th class="results">Action</th>
							<td class="results"><xsl:value-of select="c:action"/></td>	
						</tr>
						<tr class="results">
							<th class="results">Musical Instrument</th>
							<td class="results"><xsl:value-of select="c:musicalinstrument"/></td>	
						</tr>
					</xsl:for-each>
				</table>
			</xsl:for-each>
			<a href="http://mrud.net/cats/index.php?section=findcat">Click here to return!</a>
		</body>
	</html>
</xsl:template>
</xsl:stylesheet>