<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="ie=egde">	
	<link rel="stylesheet" type="text/css" href="consult.css">
</head>
<body>
<div id='form'>
<form action= "new.php" method="POST">
<label>Date:</label>
<input type="date" name="date">
<input type="submit"  name="submit" value="submit">	
</form>	
</div>
<table>
	
</table>
<?php 

$con = new mysqli("localhost", "root", "", "citassalon");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if (isset($_POST['date']) ) {
	$date=$_POST['date'];
	
$sql = "SELECT Ap_name, Ap_lastname FROM appointments WHERE Ap_date='$date' ";
$result = mysqli_query($con,$sql); // output data of each row

   while ( $row=$result->fetch_assoc()){ 	
 	  
    
    
}
mysqli_free_result($result); 
}

 
 mysqli_close($con);
 ?>

</body>
</html>