<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="ie=egde">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<div class="menu">
<?php include 'wsmenu.php';?>
</div>
<div class="form">
<form action= "consult2 - kopie.php" method="POST">
<label>Date:</label>
<input type="date" name="date">
<input type="submit"  name="submit" value="submit">	
</form>	
</div>

<?php 
$conn = new mysqli("localhost", "root", "", "citassalon");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['date']) ) {
	$date=$_POST['date'];
	
$sql = "SELECT * FROM appointments WHERE Ap_date='$date' ";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Lastname</th><th>Email<th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Ap_name"]."</td><td>".$row["Ap_lastname"]." </td><td>".$row["Ap_email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
//printf ("%s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s\n","--------------------------------",$row["Ap_name"],"------",$row["Ap_lastname"],"-----",$row["Ap_email"],"-----", $row["Ap_phone"],"------",$row["Ap_service"],"------",$row["Ap_date"],"-----",$row["Ap_hour"],"------",$row["Ap_empl"],"-----",$row["Ap_status"],"----------------------" );
}
?>
<div style= "background-image:url('salon2.jpg')" id='form'></div>
</body>
</html>