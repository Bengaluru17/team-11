<?php
 include('session.php');
 include('conec.php');
 $sql = 'SELECT * FROM item';
 
 
?>
<html>
	<h2> Welcome <?php echo $login_session; ?></h2>
	

	
	<p>Items Requested</p>
	<?php
		$result = mysqli_query($db,$sql);
		while( $row = mysqli_fetch_array($result) )
		{
			if(!$row['approved']){
				echo $row['item_name']; 
				echo $row['quantity'];
				echo $row['price'];
				echo $row['description'];
				echo "<input type=\"button\" value=\"Approve\" onclick=\"location='approve.php?item_id=".$row['item_id']."'\"/></br>";
				echo "<input type=\"button\" value=\"Deny\" onclick=\"location='deny.php?item_id=".$row['item_id']."'\"/></br>";
			}
		}
	?>
	</br>
	<p>Items approved but not bought</p>
	<?php
		$result = mysqli_query($db,$sql);
		while( $row = mysqli_fetch_array($result) )
		{
			if(!$row['done'] && $row['approved']){
				echo $row['item_name']; 
				echo $row['quantity'];
				echo $row['price'];
				echo $row['description']."</br>";
				
			}
		}
	?>
	</br>
	<p>Items bought</p>
	<?php
		$result = mysqli_query($db,$sql);
		while( $row = mysqli_fetch_array($result) )
		{
			if($row['done']){
				echo $row['item_name']; 
				echo $row['quantity'];
				echo $row['price'];
				echo $row['description']."</br>";
				
			}
		}
	?>
</html>