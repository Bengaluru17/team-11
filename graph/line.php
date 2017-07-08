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
$p->title = "Income and Expenditure per student";
$p->ylabel = "Rupees/Person";
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
			<?php
				echo "test";
			?>
		</div>
	</body>
</html>
`