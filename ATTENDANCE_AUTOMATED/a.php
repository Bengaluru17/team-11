
<?php

<<<<<<< HEAD

=======
>>>>>>> 8ed83cfe7dfa7da1a1808db96e5a0f413794ca75
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
<<<<<<< HEAD
	for ($i = 1; $i < 3 ; $i++){
		//echo "UPDATE children SET Present = $_POST[$i] WHERE ID = $i";
		$sql = "UPDATE children SET Present = $_POST[$i] WHERE ID = $i";
=======
	for ($i = 1; $i <= $_POST['count'] ; $i++){
		//echo "UPDATE children SET Present = $_POST[$i] WHERE ID = $i";
		$sql = "INSERT INTO attendance (ID,Present) VALUES ($i,$_POST[$i]) ";
>>>>>>> 8ed83cfe7dfa7da1a1808db96e5a0f413794ca75
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
		echo "Error updating record: " . $conn->error;
		}
	}
	
	
	
	
}

<<<<<<< HEAD



=======
echo "<br><br>";
/*
$sql = "CREATE TABLE ". date("dmy"). " (
  ID int(11) NOT NULL,
  CName varchar(30) DEFAULT NULL,
  Present tinyint(1) DEFAULT NULL)";
  
  if($conn->query($sql) === TRUE){
	  echo "Table created";
	}else{
		echo "cant create table";
	}

echo date("dmy");
$sql = "INSERT INTO ".date("dmy")." SELECT * FROM children";
if($conn->query($sql) ===TRUE){
	echo "data moved to warehouse";
}else{
	echo "error moving data to warehouse";
}
*/
>>>>>>> 8ed83cfe7dfa7da1a1808db96e5a0f413794ca75



?>




