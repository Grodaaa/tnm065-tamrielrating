<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns="http://www.w3.org/1999/xhtml">
<xsl:output indent="yes" encoding="UTF-8"/>
<xsl:template match="data/taverns">

<html>
	<head>
		<title>Tamriel rating</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	<body>
		<h1>Taverns</h1>
			<div class="box">
				<xsl:choose>
					<xsl:when test="name ='noresult'">
							No results found.
					</xsl:when>
					<xsl:otherwise>
						<table>	
							<xsl:for-each select="tavern">
								<tr>
									<td>	
										<a href="tavern.php?name={name}">
											<xsl:value-of select="name"/>
										</a>
									</td>
									<td>
										<xsl:value-of select="location"/>
									</td>
									<td>
										Number of ratings: <xsl:value-of select="numTaverns"/>
									</td>
									<td>
										Total rating: <xsl:value-of select="globalRating"/> 
									</td>
								</tr>
							</xsl:for-each>
						</table>
					</xsl:otherwise>
				</xsl:choose>
			</div>
			<form id="start" action="start.php">
				<p>				
					<input id="submit" type="submit" value="To start"/>
				</p>
			</form>
	</body>	
</html>
</xsl:template>
</xsl:stylesheet>