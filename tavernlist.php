<?php include 'fix/prefix.php';?>
<data>
 <?php
	$servername = "mysql.itn.liu.se";
	$username = "krien026_admin";
	$password = "GramKoja";
	
	$link = mysqli_connect($servername, $username, $password);
	if($link->connect_error){
		die("Connection failed: " . $link->connect_error);
	}
	
	if(!mysqli_select_db($link, "krien026"))
		echo "No connection \t";	
		

	$sql = "SELECT * FROM taverns";
	$result = $link->query($sql);
	
	if($result->num_rows > 0) //Om det finns tabeller
	{
		$returnstring = "<taverns>";
		
		while($row = $result->fetch_assoc()){
			$name = $row['name'];
			$location = $row['location'];
			$numTaverns = $row["numTaverns"];
			$globalRating = $row["globalRating"];
			$returnstring = $returnstring . "<tavern>
												<name>$name</name>
												<location>$location</location>
												<numTaverns>$numTaverns</numTaverns>
												<globalRating>$globalRating</globalRating>
											</tavern>";
		}
		$returnstring = $returnstring . "</taverns>";
		print utf8_encode($returnstring); //returnstring innehåller data som ska skrivas ut
	}
	if($result->num_rows == 0) //Om det inte finns tabeller
	{
		$name = "noresult";
		$returnstring = "<taverns><name>$name</name></taverns>";
		print utf8_encode($returnstring);
	}

	$link->close();
	
?>
</data>
<?php include 'fix/tavernlist_postfix.php';?>