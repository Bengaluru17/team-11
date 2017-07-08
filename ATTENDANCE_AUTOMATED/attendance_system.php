<!DOCTYPE html>
<html lang="en">

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
	
?>

<head> Online attendance<br><br> </head>

<body>

<Table border = 1>
	<tr><th>ID</th><th>Child Name </th><th>Present/Absent</th></tr>
	<?php
	echo "<form action = 'a.php' method = 'post'>";
	$sql  = "SELECT * FROM CHILDREN";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["ID"]. "</td><td> " . $row["CName"]."</td><td><input type = 'hidden' type = 'checkbox' name = ".$row['ID']. " value = '0'><input type = 'checkbox' name = ".$row['ID']. " value = '1'></td></tr>";
	}
	echo "</table>";
	}	
	echo "<input type = 'hidden' value = $result->num_rows name = 'count'>";
	echo "<input type = 'submit' name = 'submit' value = 'submit'/></form>";
	
	?>

</body>