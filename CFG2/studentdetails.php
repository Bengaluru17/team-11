<?php
 
 include('conec.php');
 $sql = 'SELECT * FROM student ORDER by name';
 
 
?>
<html>
	<h2> Student management </h2>
	
	<button onclick="location.href = 'addstudent.php';">Add Students</button>
	
	<p>Student List</p>
	<?php
		$result = mysqli_query($dbh,$sql);
		$i = 1;
		while( $row = mysqli_fetch_array($result) )
		{
			echo $i++;
			echo "<input type=\"checkbox\">";
			echo " <a href=\"#\">".$row[1]."</a></br>";
		}
	?>
	<button onclick="location.href = '#';">Delete Students</button>
</html>