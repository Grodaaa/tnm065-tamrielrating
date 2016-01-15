<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns="http://www.w3.org/1999/xhtml">
<xsl:output indent="yes" encoding="UTF-8"/>
<xsl:template match="data/ratings">

 <html>
	<head>
		<title>Tamriel rating</title>
		<link rel="stylesheet" type="text/css" href="style/style_mobile.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
	</head>
	<body id="test">
		<h1>Ratings</h1>
			<div class="box">
				<div style="overflow: auto; height: 60%;">
					<xsl:choose>
						<xsl:when test="name ='noresult'">
							No results found.
						</xsl:when>
						<xsl:otherwise>
							<h2> <xsl:value-of select="name"/> </h2>
							<xsl:for-each select="rating">
								<div class="ratingItem">
									<i>"<xsl:value-of select="description"/>"</i>
									<br/>
									Food: <xsl:value-of select="foodRating"/>
									<br/>
									Service: <xsl:value-of select="serviceRating"/>
									<br/>
									Comfort: <xsl:value-of select="comfortRating"/>
									<br/>
									Location: <xsl:value-of select="locationRating"/>
									<br/>
									<strong>Total rating: <xsl:value-of select="totalRating"/></strong>
									<br/>
								</div>
								<br/>
							</xsl:for-each>
						</xsl:otherwise>
					</xsl:choose>
				</div>
				<form id="start" action="tavernlist.php">
					<p>				
						<input id="submit" type="submit" value="Back to list"/>
					</p>
				</form>
								<form id="start" action="start.php">
					<p>				
						<input id="submit" type="submit" value="Back start"/>
					</p>
				</form>
			</div>
	</body>
		
</html>
</xsl:template>
</xsl:stylesheet>