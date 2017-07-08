<?php
    // Connect to mysql
    include("conec.php");
	//require_once 'vendor/autoload.php'; // Loads the library 
 
	//use Twilio\Rest\Client; 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$student_name = mysqli_real_escape_string($dbh, $_POST['student_name']);
		$gender = mysqli_real_escape_string($dbh, $_POST['gender']);
		$age = mysqli_real_escape_string($dbh, $_POST['age']);
		$interest = mysqli_real_escape_string($dbh, $_POST['interest']);
		$class = mysqli_real_escape_string($dbh, $_POST['class']);
		$school = mysqli_real_escape_string($dbh, $_POST['school']);
		$height = mysqli_real_escape_string($dbh, $_POST['height']);
		$weight = mysqli_real_escape_string($dbh, $_POST['weight']);
		$marks = mysqli_real_escape_string($dbh, $_POST['marks']);
		// Prepare the SQL statement
		$SQL = "INSERT INTO team11.student (name, gender, age, interests, class, school, height, weight, marks) VALUES ('$student_name', '$gender', '$age', '$interest', '$class', '$school', '$height', '$weight', '$marks')";
	
		// Execute SQL statement
		mysqli_query($dbh, $SQL);//$dbh is the connection command variable from 'conec.php'
		
	}
?>
<html>
	<h2> Student management </h2>
	<p>Add Student</p>
	<body>
		<div >
			<form method="post" action="">
	
			</br>
			
				<input type="text" name="student_name"  placeholder="Name">
				</br>
				
				<input type="text" name="gender"  placeholder="Gender">
				</br>
				
				<input type="text" name="age" placeholder="Age" >
				</br>
				
				<input type="text" name="interest" placeholder="Interests">
				</br>
				
				<input type="text" name="class" placeholder="Class">
				</br>
				
				<input type="text" name="school" placeholder="School">
				</br>
				
				<input type="text" name="height" placeholder="Height">
				</br>
				
				<input type="text" name="weight" placeholder="Weight">
				</br>
				
				<input type="text" name="marks" placeholder="Marks">
				</br>
				
				</br>
				<button type="submit" onclick="location.href = 'addstudent.php';">Add More Students</button>
				</br>
				</br>
				<button type="submit" onclick="location.href = 'studentdetails.php';"><span>Add</span></button>
				
				</br>
			
		</form>
		
		</div>
</html>