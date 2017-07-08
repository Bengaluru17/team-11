<!DOCTYPE html>
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
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Responstable 2.0: a responsive table solution</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
  <h1>Responstable <span>2.0</span> by <span>jordyvanraaij</span></h1>

<table class="responstable">
  
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
  
</table>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>

  
</body>
</html>
