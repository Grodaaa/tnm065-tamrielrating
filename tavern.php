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
		echo "Could not connect to DB \t";
	
	//Får $name-variabeln genom GET-metoden. 
	$search = $_GET["name"];

	//Letar efter $name i 'tavern'
	$sql = "SELECT * FROM ratings WHERE name='$search'";
	$result = $link->query($sql);
	
	if($result->num_rows > 0){
		//Om $name finns i 'taverns'
		$returnstring = "<ratings>";
		while($row = $result->fetch_assoc()){
			$name = $row['name'];
			$description = $row["description"];
			$foodRating = $row["foodRating"];
			$serviceRating = $row["serviceRating"];
			$comfortRating = $row["comfortRating"];
			$locationRating = $row["locationRating"];
			$totalRating = $row["totalRating"];
			$returnstring = $returnstring . "<name>$name</name>
											 <rating>
												<description>$description</description>
												<foodRating>$foodRating</foodRating>
												<serviceRating>$serviceRating</serviceRating>
												<comfortRating>$comfortRating</comfortRating>
												<locationRating>$locationRating</locationRating>
												<totalRating>$totalRating</totalRating>
											</rating>";
			}
		$returnstring = $returnstring . "</ratings>";
		print utf8_encode($returnstring);
	}
	if($result->num_rows == 0){
		//Om $name inte kunde hittas
		$name = "noresult";
		$returnstring = "<ratings><name>$name</name></ratings>";
		print utf8_encode($returnstring);
	}	

	$link->close();
    ?>
</data>
<?php include 'fix/tavern_postfix.php';?>