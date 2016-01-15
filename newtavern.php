<?php header("Content-type:text/html;charset=utf-8");?>
<?php
	//Kopplar upp mot databasen
	$servername = "mysql.itn.liu.se";
	$username = "krien026_admin";
	$password = "GramKoja";
	
	$link = mysqli_connect($servername, $username, $password);
	if($link->connect_error){
		die("Connection failed: " . $link->connect_error);
	}
	
	if(!mysqli_select_db($link, "krien026"))
		echo "Gick ej att ansluta \t";
	
	//Hämtar data från add-formuläret
	$name = $_POST["name"];
	$location = $_POST["location"];
	$description = $_POST["description"];
	$food = $_POST["food"];
	$service = $_POST["service"];
	$comfort = $_POST["comfort"];
	$locationRating = $_POST["locationRating"];

	/*
		När användaren trycker på submit i add.php
			1. Kolla efter $name i taverns
			2.
				a. Om $name inte finns, skapa en ny rad i taverns med $name, $location, $numTaverns (=1), $globalRating
				b. Om $name finns, plussa på $numTaverns samt räkna ut ny $globalRating
			3. Lägg till ratingen i ratings $name, $description, alla ratings
			4. Skicka vidare användaren till sidan där man ser ratingen på tavernet, tavern.php?name=$name"
	*/
	
	//Letar efter $name i tavern
	$sql = "SELECT name FROM taverns WHERE name='$name'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	echo $name . "<br>";
	echo $row["name"];
	
	//Räknar ut totalbetygen från $food, $comfort, $service och $locationRating
	$total = ($food + $service + $comfort + $locationRating)/4.0;
	
	if($row["name"] == "" && $name != "") //Om $name inte finns i taverns
	{	
		//Lägger in en ny rad i 'taverns'
		$sql = "INSERT INTO taverns(name, location, numTaverns, globalRating)
				VALUES('$name', '$location', 1, '$total')";

		if($link->query($sql) === TRUE)
			echo "New tavern created successfully" . "<br>";
		else
			echo "Error!" . $sql . "<br>" . $link->error;
		//Lägger in en ny rad i 'ratings'
		$sql = "INSERT INTO ratings(name, description, foodRating, serviceRating, comfortRating, locationRating, totalRating)
				VALUES('$name', '$description', '$food', '$service', '$comfort', '$locationRating', '$total')";

		if($link->query($sql) === TRUE)
			echo "New rating created successfully" . "<br>";
		else
			echo "Error!" . $sql . "<br>" . $link->error;				
	}	
	else if($row["name"] == $name && $name != "") //Om $name finns i taverns
	{		
		//Lägger in ny rad i 'ratings'
		$sql = "INSERT INTO ratings(name, description, foodRating, serviceRating, comfortRating, locationRating, totalRating)
				VALUES('$name', '$description', '$food', '$service', '$comfort', '$locationRating', '$total')";

		if($link->query($sql) === TRUE)
			echo "New rating created successfully" . "<br>";
		else
			echo "Error!" . $sql . "<br>" . $link->error;
		
		//Hämtar numTaverns samt globalRating från 'taverns'
		$sql = "SELECT * FROM taverns WHERE name='$name'";
		$temp = $link->query($sql);
		$temp2 = $temp->fetch_assoc();
		
		$newNum = $temp2["numTaverns"];
		$newTotal = $temp2["globalRating"];
		
		//Räknar ut ny globalRating
		$newTotal2 = (($newTotal * $newNum)+$total)/($newNum + 1.0);
		$newNum = $newNum + 1.0;
		
		//Uppdaterar datan
		$sql = "UPDATE taverns
				SET numTaverns='$newNum', globalRating='$newTotal2'
				WHERE name='$name'";
				
		if($link->query($sql) === TRUE)
			echo "Ratings updated!" . "<br>";
		else
			echo "Error!" . $sql . "<br>" . $link->error;			
	}				

	$link->close();
	
	//Flyttar användaren till sidan för värdshuset
	header("Location: tavern.php?name=$name");
	exit();
?>