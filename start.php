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
		echo "Can't connect \t";
	
	$sql = "SELECT * FROM taverns";
	$result = $link->query($sql);
	
	//Tar bort tabeller
	/*if($result)
	{
		$delete = "DROP TABLE taverns";
		$link->query($delete);
		echo "BORTA!";
		$delete = "DROP TABLE ratings";
		$link->query($delete);
		echo "BORTA!";
	}*/
	
	//Skapar tabellen 'taverns' om den inte redan finns
	if(!$result)
	{		
		$create_table_1 = "CREATE TABLE taverns (
		name VARCHAR(255) NOT NULL,
		location VARCHAR(255) NOT NULL,
		numTaverns FLOAT NOT NULL,
		globalRating FLOAT NOT NULL
		)";
		
		if($link->query($create_table_1) === TRUE)
			echo "Table 1 created :)";
		else
			echo "Table 1 could not be created :'(";
	}

	$sql2 = "SELECT * FROM ratings";
	$result_rating = $link->query($sql2);

	//Skapar tabellen 'ratings' om den inte redan finns
	if(!$result_rating)
	{
		echo "Inget resultat, skapar table";
		$create_table_2 = "CREATE TABLE ratings (
		name VARCHAR(255) NOT NULL,
		description LONGTEXT NOT NULL,
		foodRating FLOAT NOT NULL,
		serviceRating FLOAT NOT NULL,
		comfortRating FLOAT NOT NULL,
		locationRating FLOAT NOT NULL,
		totalRating FLOAT NOT NULL	
		)";
		
		if($link->query($create_table_2) === TRUE)
			echo "Table 2 created :)";
		else
			echo "Table 2 could not be created :'(";
	}

	$link->close();
    ?>
</data>
<?php include 'fix/start_postfix.php';?>