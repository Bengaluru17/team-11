<?php
	include('config.php');
	$item_id = $_GET["item_id"];
	$SQL = "UPDATE team11.item SET done=1 where item_id = ('".$_GET["item_id"]."')";    
	$SQL_EXP = "SELECT price, quantity from item where item_id = ('".$_GET["item_id"]."')"
    // Execute SQL statement
   
	$result = mysqli_query($db, $SQL_EXP);
	$row = mysqli_fetch_array($result);
	$expenditure = $row[1] * $row[2];
	$SQL_EXP_INS = "INSERT INTO expenditure (expenditure) VALUES ('$expenditure')";
	mysqli_query($db, $SQL_EXP_INS);
	mysqli_query($db, $SQL);//$dbh is the connection command variable from 'conec.php
	header("Location: staff.php");
?>