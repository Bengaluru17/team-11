<?php
 
 include('conec.php');
 $sql = 'SELECT * FROM repogirls ORDER by item_name';
 
 
?>
<html>
	<h2> Repository management </h2>
	
	<button onclick="location.href = 'addrepoGirls.php';">Add items</button>
	
	<p>Student List</p>
	<?php
		$result = mysqli_query($dbh,$sql);
		$i = 1;
		while( $row = mysqli_fetch_array($result) )
		{
			echo $i++;
			echo "<input type=\"checkbox\">";
			echo $row[1]." ";
			echo $row[2]." ";
			echo $row[3]."</br> ";
		}
	?>
	<button onclick="location.href = '#';">Delete Items</button>
</html>