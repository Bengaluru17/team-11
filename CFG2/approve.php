<?php
	include('config.php');
	$SQL = "UPDATE team11.item SET approved=1 where item_id = ('".$_GET["item_id"]."')";    
	
    // Execute SQL statement
    mysqli_query($db, $SQL);//$dbh is the connection command variable from 'conec.php'
	header("Location: admin.php");
?>