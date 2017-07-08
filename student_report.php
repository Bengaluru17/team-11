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
	echo "connected successfully!<br><br>";
	}
	
	?>
	
	<head> Student Report</head>
	
	<body>
	
	<Table border = 1>
		<tr><td>ID</td><td>Student Name</td><td>Gender</td><td>Age</td><td>Class</td><td>Co-Corricular</td><td>School</td><td>Height</td><td>Weight</td><td>Marks</td></tr>
		<?php
			$sql = "SELECT * FROM student_report";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row['ID']."</td><td>".$row['Student Name']."</td><td>".$row['Gender']."</td><td>".$row['Age']."</td><td>".$row['Class']."</td><td>".$row['Co-Corricular']."</td><td>".$row['School']."</td><td>".$row['Height']."</td><td>".$row['Weight']."</td><td>".$row['Marks']."</td></tr>";
			}
			echo "</table>";
			}
			
			echo "<br><br><br>Summary of Student Report";
			echo "<Table border = 1>";
				echo "<tr><th> No. of Students </th><th>No. of Boys</th><th>No. of Girls</th><th>Average Age</th></tr>";
				$sql1 = "SELECT count(*) as boys from student_report where Gender = 'male' or Gender = 'Male'";
				$result1 = $conn->query($sql1);
				$row1 = $result1->fetch_assoc();
				
				$sql2 = "SELECT count(*) as girls from student_report where Gender = 'female' or Gender = 'Female'";
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_assoc();
				
				$sql3 = "SELECT avg(Age) as avg from student_report";
				$result3 = $conn->query($sql3);
				$row3 = $result3->fetch_assoc();
				
				echo "<tr><td>".$result->num_rows."</td><td>".$row1['boys']."</td><td>".$row2['girls']."</td><td>".$row3['avg']."</td></tr></table>";
				
	?>
	
	</body>
	
	</html>
	
	
	
	
	
	
	
	
	
	
	
	
	