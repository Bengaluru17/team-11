<?php
    // Connect to mysql
    include("conec.php");
	//require_once 'vendor/autoload.php'; // Loads the library 
 
	//use Twilio\Rest\Client; 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$item_name = mysqli_real_escape_string($dbh, $_POST['item_name']);
		$quantity = mysqli_real_escape_string($dbh, $_POST['quantity']);
		$price = mysqli_real_escape_string($dbh, $_POST['price']);
		
		// Prepare the SQL statement
		$SQL = "INSERT INTO team11.repofood (item_name, price, quantity) VALUES ('$item_name', '$price', '$quantity')";
	
		// Execute SQL statement
		mysqli_query($dbh, $SQL);//$dbh is the connection command variable from 'conec.php'
		
	
	
	
		/*$account_sid = 'AC7bd25c9d2fd6296c5a57cb248816f381'; 
		$auth_token = '6e7bbf51d493862277ca6772056feaf8'; 
		$client = new Client($account_sid, $auth_token); 
		
		$messages = $client->api->v2010->accounts("AC7bd25c9d2fd6296c5a57cb248816f381") 
		->messages->create("+919740284516", array( 
				'From' => "+15109451364",  
				'Body' => "items: $item_name\n quantity: $quantity \n price per piece: $price \n description; $description",      
		));*/
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
			
				
				</br>
				
				</br>
				<button type="submit" class="btn"><span>Add</span></button>
				
				</br>
			
		</form>
		
		</div>
		
	</body>
</html>