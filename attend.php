<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
        </head>
<style>

    </style>
    <header>  <h1 align="center" ><font color="BLUE" line-height:18px;>WELCOME TO THE ATTENDANCE LIST..!!</font></h1><br/>

      <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "myDB";
  //create connection
  $conn = new mysqli($servername,$username,$password,$database);
  //check connection
  if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
  }else{
  echo "connected successfully!";
  }
  
?>


<body style= background-color:white>        
        <!--/.Navbar-->
       <!--Indigo-->
       <p align="center" margin-bottom:2cm;>
<button type="button" class="btn btn-indigo">ADD A NEW STUDENT</button></p>
<div class="container">
  <h2></h2>
  <p></p>            
  <table class="table">
    <thead>
      <tr>
        <th>Roll number</th>
        <th>student name</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      <?php
  echo "<form action = 'a.php' method = 'post'>";
  $sql  = "SELECT * FROM CHILDREN";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["ID"]. "</td><td> " . $row["CName"]."</td><td><input type = 'hidden' type = 'checkbox' name = ".$row['ID']. " value = '0'><input type = 'checkbox' name = ".$row['ID']. " value = '1'></td></tr>";
  }
  echo "</table>";
  } 
  echo "<input type = 'hidden' value = $result->num_rows name = 'count'>";
  echo "<input type = 'submit' name = 'submit' value = 'submit'/></form>";
  
  ?>
    </tbody>
  </table>
</div>
</body>

</html>