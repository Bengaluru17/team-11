
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
		$sql = "INSERT INTO attendance (ID,Present) VALUES ($i,$_POST[$i]) ";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
		echo "Error updating record: " . $conn->error;
		}
	}
}
echo "<table border = 1>";
echo "<tr><th>ID </th><th>CName</th><th>Present</th></tr>";
$sql = "SELECT * FROM children RIGHT JOIN attendance ON children.ID = attendance.ID group by attendance.Date,children.CName order by attendance.Date,attendance.ID" ;
$result = $conn->query($sql);
if($result->num_rows >0){
	$date = null;
	while($row = $result->fetch_assoc()){
	if($date != $row['Date']) {
	$date = $row['Date'];
		echo "<tr><th colspan = 3>".$row['Date']."</th></tr>";
	if($row['Present'] == 1){
		
		echo "<tr><td>".$row['ID']." </td><td>".$row['CName']."</td><td>Yes</td></tr>";
	}
	else{
				echo "<tr><td>".$row['ID']." </td><td>".$row['CName']."</td><td>No</td></tr>";

	}
	}
	else{
		if($row['Present'] == 1){
		echo "<tr><td>".$row['ID']." </td><td>".$row['CName']."</td><td>Yes</td></tr>";
	}
	else{
				echo "<tr><td>".$row['ID']." </td><td>".$row['CName']."</td><td>No</td></tr>";

	}
	}
	}
	echo "</table>";
}

echo "<br><br>";



?>




