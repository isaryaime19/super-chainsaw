<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="ie=egde">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="app.css">
	<title></title>	
</head>
<body>
	<div class="menu">
	<?php include 'wsmenu.php';?>
    </div>	
<div id="form">
<form action= "appoint.php" method="POST">
	<h1>Appointments Register</h1>
	<label>Name:</label>
	<input type="text" name="name">
	<br>
	<label>Lastname:</label>
	<input type="text" name="lastname">
	<br>
	<label>Service:</label>
	<input type="Text" name="service" maxlength="100">
	<br>
	<label>Date:</label>
	<input type="date" name="date">
	<br>
	<label>Hour:</label>
	<input type="time" name="hour">
	<br>
	<label>Telephone:</label>
	<input type="text" name="Telephone">
	<br>
	<label>Email:</label>
	<input type="email" name="email">
	<br>
	<label>Employee:</label>
	<input type="text" name="employee">
	<br>
	<label>Status:</label>
	<input type="text" name="status">
	<br>
	<label>Comment:</label>
	<textarea name="comment" rows="5" cols="40"></textarea>
	<br>
	<input type="reset" name="reset">
	<input type="submit"  name="submit" value="submit">	
</form>
</div>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="citassalon";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['name']) and isset($_POST['lastname'])) {
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$service=$_POST['service'];
	$date=$_POST['date'];
	$hour=$_POST['hour'];
	$Telephone=$_POST['Telephone'];
	$email=$_POST['email'];
	$employee=$_POST['employee'];
	$status=$_POST['status'];
$sql = "INSERT INTO appointments (Ap_name, Ap_lastname, Ap_service, Ap_date, Ap_hour, Ap_phone, Ap_email, Ap_empl, Ap_status)
VALUES ('$name', '$lastname','$service', '$date', '$hour', '$Telephone', '$email', '$employee', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<?php include 'footer.php';?>
</body>
</html>