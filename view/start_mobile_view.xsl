<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns="http://www.w3.org/1999/xhtml">
<xsl:output indent="yes" encoding="UTF-8"/>
<xsl:template match="data">
 <html>
	<head>
		<title>Tamriel rating - mobile</title>
		<link rel="stylesheet" type="text/css" href="style/style_mobile.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
	</head>
	<body>
		<h1>Tamriel rating</h1>
			<form id="form" action="tavern.php?" method="get" onsubmit="return validate()">
					<input class="search" type="text" value="Search..." name="name"/>
					<input class="button" type="submit" value="Search"/>
			</form>
		<form id="go2add" action="add.php">
			<input id="addButton" type="submit" value="Add tavern"/>
		</form>
		<form id="go2tavern" action="tavernlist.php">			
			<input id="listButton" type="submit" value="List taverns"/>
		</form>
	</body>		
</html>
</xsl:template>
</xsl:stylesheet>