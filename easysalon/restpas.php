<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="ie=egde">	
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="form">
<form action= "restpas.php" method="POST">
	
	<label>Email:</label><br>
	<input type="text" name="email">
	<br>
	<br>
	<label>Security Answer:</label><br>
	<input type="text" name="answer">
	<br>
	<br>
	<label>New password:</label><br>
	<input type="password" name="npass">
	<input type="submit" id="btn" name="submit" value="submit">
	<br>
	<br>
	<a href="logineasy.php">Go back to the login</a>
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
if (isset($_POST['email']) and isset($_POST['answer'])) {
	$email=$_POST['email'];
	$answer=$_POST['answer'];
	$npass=$_POST['npass'];
	//echo $uname;	
	//echo $pass;

$sql = "UPDATE login SET Log_paswoord='$npass' WHERE Log_email='$email' and answer='$answer'";"";
        $result = $conn->query($sql); 
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
         
}else {
    echo "0 results";
}
$conn->close();

 ?>
</body>
</html>