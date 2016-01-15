<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns="http://www.w3.org/1999/xhtml">
<xsl:output indent="yes" encoding="UTF-8"/>
<xsl:template match="data">

 <html>
	<head>
		<title>Tamriel rating</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	<body>
		<div class="box">
			<h2> Add tavern</h2>
			<form action="newtavern.php"  method="post">
				<table>
					<tr>
						<td>
							<input type="text" name="name" placeholder="Name..." value="{name}"></input>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="location" placeholder="Location..." value="{location}"></input>
						</td>
					</tr>
					<tr>
						<td>
							<textarea type="text" name="description" rows="5" cols="40" value="{description}">Description..</textarea>
						</td>
					</tr>
					<tr>
						<td>
							Food rating:
							<input type="radio" name="food" value="1" checked="true">1</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="foodRating=1"/>
								</xsl:if>	
							<input type="radio" name="food" value="2">2</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="foodRating=2"/>
								</xsl:if>	
							<input type="radio" name="food" value="3">3</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="foodRating=3"/>
								</xsl:if>	
							<input type="radio" name="food" value="4">4</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="foodRating=4"/>
								</xsl:if>
							<input type="radio" name="food" value="5">5</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="foodRating=5"/>
								</xsl:if>	
						</td>
					</tr>
					<tr>
						<td>
							Service rating:
							<input type="radio" name="service" value="1" checked="true">1</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="serviceRating=1"/>
								</xsl:if>
							<input type="radio" name="service" value="2">2</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="serviceRating=2"/>
								</xsl:if>
							<input type="radio" name="service" value="3">3</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="serviceRating=3"/>
								</xsl:if>
							<input type="radio" name="service" value="4">4</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="serviceRating=4"/>
								</xsl:if>
							<input type="radio" name="service" value="5">5</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="serviceRating=5"/>
								</xsl:if>
						</td>
					</tr>
					<tr>
						<td>
							Comfort rating:
							<input type="radio" name="comfort" value="1" checked="true">1</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="comfortRating=1"/>
								</xsl:if>
							<input type="radio" name="comfort" value="2">2</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="comfortRating=2"/>
								</xsl:if>
							<input type="radio" name="comfort" value="3">3</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="comfortRating=3"/>
								</xsl:if>
							<input type="radio" name="comfort" value="4">4</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="comfortRating=4"/>
								</xsl:if>
							<input type="radio" name="comfort" value="5">5</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="comfortRating=5"/>
								</xsl:if>
						</td>
					</tr>
					<tr>
						<td>
							Location rating:
							<input type="radio" name="locationRating" value="1" checked="true">1</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="locationRating=1"/>
								</xsl:if>
							<input type="radio" name="locationRating" value="2">2</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="locationRating=2"/>
								</xsl:if>
							<input type="radio" name="locationRating" value="3">3</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="locationRating=3"/>
								</xsl:if>
							<input type="radio" name="locationRating" value="4">4</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="locationRating=4"/>
								</xsl:if>
							<input type="radio" name="locationRating" value="5">5</input>
								<xsl:if test="checked=true">
									<xsl:value-of select="locationRating=5"/>
								</xsl:if>
						</td>
					</tr>
				</table>
				<input id="submit" type="submit" value="Submit"/>
			</form>
			<form id="start" action="start.php">
			<tr>
				<td><input id="submit" type="submit" value="Back"/></td>
			</tr>
			</form>
		</div>
	</body>
</html>
</xsl:template>
</xsl:stylesheet>

