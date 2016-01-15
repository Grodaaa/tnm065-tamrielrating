<?php include 'fix/prefix.php';?>
<data>
 <?php  
	$servername = "mysql.itn.liu.se";
	$username = "krien026_edit";
	$password = "GlamStoja";
	
	$link = mysqli_connect($servername, $username, $password);
	if($link->connect_error){
		die("Connection failed: " . $link->connect_error);
	}
	
	if(!mysqli_select_db($link, "krien026"))
		echo "nayy \t";		

	$link->close();
?>
</data>
<?php include 'fix/add_postfix.php';?>