<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="ie=egde">
<link rel="stylesheet" type="text/css" href="estilos.css">	
<div class="menu">
<?php include 'wsmenu.php';?>
</div>
	<title></title>
</head>
<body>
<div class="form">
<?php 
echo "Username: " . $_SESSION['Log_username']. ".<br>";
echo "Password: " . $_SESSION['Log_paswoord'] . ".<br>";
echo "Name: " . $_SESSION['Log_name']. ".<br>";
echo "Lastname: " . $_SESSION['Log_lastname'] . ".";
?>
</div>
</body>
</html>