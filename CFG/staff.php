<?php
 include('session.php');
 include('conec.php');
 $sql = 'SELECT * FROM item';
 
 
?>
<html>
	<h2> Welcome <?php echo $login_session; ?></h2>
	
	<button onclick="location.href = 'staff_request.php';">Request</button>
	
	<p>Approved items</p>
	<?php
		$result = mysqli_query($db,$sql);
		while( $row = mysqli_fetch_array($result) )
		{
			if($row['approved'] && !$row['done']){
				echo $row['item_name']; 
				echo $row['quantity'];
				echo $row['price'];
				echo $row['description'];
				echo "<input type=\"button\" value=\"Done\" onclick=\"location='update.php?item_id=".$row['item_id']."'\"/>";
			}
		}
	?>
</html>