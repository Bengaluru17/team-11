<?php
include("lib/inc/chartphp_dist.php");

$p = new chartphp();

$servername = "localhost";
$username = "root";
$password = "elson.1996";
$database = "code_for_good";

//create connection
$conn = new mysqli($servername,$username,$password,$database);
//check connection
if($conn->connect_error){
	die("Connection Failed:".$conn->connect_error);
}else{
	echo "connected successfully!";
}
	
$sql  = "SELECT *  FROM chart";

$result = $conn->query($sql);
//echo $result->fetch_assoc();
if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
    while($row = $result->fetch_assoc()) {
       	$exp[$i] = array($row["date"],$row["expenditure"]/1);
	$i++;

} 
}else {
	echo "No data";
}

$p->data = array($exp);

$p->chart_type = "line";

// Common Options
$p->title = "Finance Report";
$p->ylabel = "Rupees";
$p->series_label = array("time");

$p->options["axes"]["yaxis"]["tickOptions"]["prefix"] = 'Rs';

$out = $p->render('c1');
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="lib/js/jquery.min.js"></script>
		<script src="lib/js/chartphp.js"></script>
		<link rel="stylesheet" href="lib/js/chartphp.css">
	</head>
	<body>
		<div style="width:100%; min-width:450px;">
			<?php echo $out; ?>
		</div>
		<div>
		<table border=1>
			<tr><th>Date</th><th>Expenditure</th><th>Income</th><th>Number Of Students</th><th>Budget</th></tr>
			<?php
				$sql  = "SELECT * FROM chart";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    				// output data of each row
					$row = $result->fetch_assoc();
					$prevBudget = $row['budget'];
					echo "<tr><td>".$row['date']."</td><td>".$row['expenditure']."</td><td>".$row['income']."</td><td>".$row['no_of_students']."</td><td>".$prevBudget."</td></tr>";
    					while($row = $result->fetch_assoc()){	
						$prevBudget+=$row['income']-$row['expenditure'];
						echo "<tr><td>".$row['date']."</td><td>".$row['expenditure']."</td><td>".$row['income']."</td><td>".$row['no_of_students']."</td><td>".$prevBudget."</td></tr>";
					}
					
					echo "</table>";
				}
			?>
		</div>
	</body>
</html>
