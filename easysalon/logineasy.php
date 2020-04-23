<?php
// Start the session
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="ie=egde">	
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title></title>
</head>
<body>	
<div id="form">
<form action= "logineasy.php" method="POST">
	<h1></h1>
	<br>
	<br>
	<label>Username:</label><br>
	<input type="text" name="uname">
	<br>
	<br>
	<label>Password:</label><br>
	<input type="password" name="pass">
	<br>
	<br>
	<input type="submit" id="btn" name="submit" value="Login">
	<br>
	<br>
	<a href="restpas.php">Passwoord recover</a>
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
if (isset($_POST['uname']) and isset($_POST['pass'])) {
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	//echo $uname;	
	//echo $pass;

$sql = "SELECT Log_username, Log_paswoord FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) { 
    if ($row["Log_username"]==$uname and $row["Log_paswoord"]==$pass) {
    	header("location:page.php");
    }else{
    	echo "usuario o contrasena no validos";
    }
    }
      // echo "username " . $row["Log_username"]. " - password: " . $row["Log_paswoord"]. " " "<br>";

} else {
    echo "0 results";
}
//$_SESSION['Log_username'] = $uname;
//$_SESSION['Log_paswoord'] = $pass;
$conn->close();
}
?>

</body>
</html>