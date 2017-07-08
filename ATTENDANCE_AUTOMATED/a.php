
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "myDB";
	//create connection
	$conn = new mysqli($servername,$username,$password,$database);
	//check connection
	if($conn->connect_error){
		die("Connection Failed:".$conn->connect_error);
	}else{
	echo "connected successfully!";
	}


if($_SERVER['REQUEST_METHOD'] == "POST"){
	for ($i = 1; $i <= $_POST['count'] ; $i++){
		//echo "UPDATE children SET Present = $_POST[$i] WHERE ID = $i";
		$sql = "INSERT INTO attendance (ID,Present) VALUES ($i,$_POST[$i]) ";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
		echo "Error updating record: " . $conn->error;
		}
	}
	
	
	
	
}

echo "<br><br>";



?>




