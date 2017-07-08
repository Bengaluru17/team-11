<?php
	include('config.php');
	$SQL = "DELETE FROM team11.item WHERE item_id = ('".$_GET["item_id"]."')";    

    // Execute SQL statement
    mysqli_query($db, $SQL);//$dbh is the connection command variable from 'conec.php'
	header("Location: admin.php");
?>