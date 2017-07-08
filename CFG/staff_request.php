<?php
    // Connect to mysql
    include("conec.php");
	require_once 'vendor/autoload.php'; // Loads the library 
 
	use Twilio\Rest\Client; 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$item_name = mysqli_real_escape_string($dbh, $_POST['item_name']);
		$quantity = mysqli_real_escape_string($dbh, $_POST['quantity']);
		$price = mysqli_real_escape_string($dbh, $_POST['price']);
		$description = mysqli_real_escape_string($dbh, $_POST['description']);
		// Prepare the SQL statement
		$SQL = "INSERT INTO team11.item (item_name, price, quantity, description, approved) VALUES ('$item_name', '$price', '$quantity', '$description', 0)";
	
		// Execute SQL statement
		mysqli_query($dbh, $SQL);//$dbh is the connection command variable from 'conec.php'
		
	
	
	
		$account_sid = 'AC7bd25c9d2fd6296c5a57cb248816f381'; 
		$auth_token = '6e7bbf51d493862277ca6772056feaf8'; 
		$client = new Client($account_sid, $auth_token); 
		
		$messages = $client->api->v2010->accounts("AC7bd25c9d2fd6296c5a57cb248816f381") 
		->messages->create("+919740284516", array( 
				'From' => "+15109451364",  
				'Body' => "items: $item_name\n quantity: $quantity \n price per piece: $price \n description; $description",      
		));
	}
?>
<html>
	<head>
		<script>
			$(document).ready(function() {
			var max_fields      = 1000; //maximum input boxes allowed
			var wrapper         = $(".input_fields_wrap"); //Fields wrapper
			var add_button      = $(".add_field_button"); //Add button ID
			
			var x = 1; //initlal text box count
			$(add_button).click(function(e){ //on add input button click
				e.preventDefault();
				if(x < max_fields){ //max input box allowed
					x++; //text box increment
					//$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
					$(wrapper).append('<div class="input_fields_wrap"></div>'); //add input box
				}
			});
    
			$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
				e.preventDefault(); $(this).parent('div').remove(); x--;
			})
		});
		</script>
	</head>
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
				<button class="add_field_button">Add More Fields</button>
				</br>
				</br>
				<button type="submit" class="btn"><span>Request</span></button>
				
				</br>
			
		</form>
		
		</div>
		
	</body>
</html>