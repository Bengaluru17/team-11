<?php
    // Connect to mysql
    include("conec.php");
	//require_once 'vendor/autoload.php'; // Loads the library 
 
	//use Twilio\Rest\Client; 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$item_name = mysqli_real_escape_string($dbh, $_POST['item_name']);
		$quantity = mysqli_real_escape_string($dbh, $_POST['quantity']);
		$price = mysqli_real_escape_string($dbh, $_POST['price']);
		$description = mysqli_real_escape_string($dbh, $_POST['description']);
		// Prepare the SQL statement
		$SQL = "INSERT INTO team11.repoGirls (item_name, price, quantity, description, approved, done) VALUES ('$item_name', '$price', '$quantity', '$description', 0, 0)";
	
		// Execute SQL statement
		mysqli_query($dbh, $SQL);//$dbh is the connection command variable from 'conec.php'
	}
?>
<html>
	
	<body>
		<div class="input_fields_wrap">
			<form method="post" action="">
	
			</br>
			
				<input type="text" name="item_name"  placeholder="item">
				</br>
				
				<input type="text" name="quantity"  placeholder="quantity">
				</br>
				
				<input type="text" name="price" placeholder="Price" >
				</br>
				
				<input type="text" name="description" placeholder="Description">
				</br>
				
				</br>
				
				</br>
				<button type="submit" class="btn"><span>Add</span></button>
				
				</br>
			
		</form>
		
		</div>
		
	</body>
</html>