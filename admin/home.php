<?php

require_once "../include/connection-config.inc.php";
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
		
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page and if yes then redirect back to welcoe page depend on his role.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../account/login.php");
    exit;
} else {
	if ($_SESSION["role"] == "client") {
		header("location: ../client/");
	} 
    if ($_SESSION["role"] == "customer") {
		header("location: ../customer/");
	}
}
	$name = $_SESSION["username"];
	
	$sql = "SELECT * FROM user WHERE ID='$name'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)):
	
		$image = $row["Image"];
	endwhile;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" /><!--Sets the initial zoom level when the page is first loaded by the browser-->
	<!--Include online Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
	<!--End-->
</head>
<body>

	<?php include('include/header.html');?>
	
	<!--Content-->
	<div class= "container-fluid backgroundImage">
		
		<div class="jumbotron text-center mb-0 d-none d-sm-block backgroundImage"><!--Jumbotron is lightweight, flexible component for calling extra attention-->
			<h1 class="text-left">Welcome Back, <?php echo $name ?></h1>
			<br><br><br>
			<h1>Welcome to Digital Printing Shop where</h1>
			<h1>you can Print Anywhere, Anytime!</h1>
			<br><br><br>
			<img src="../file_store/profile_img/<?php echo $image ?>" class="img-fluid image" alt="Responsive image" width="250" height="250">
			<br><br><br><br><br> 
		</div>	

	</div>

	<?php include('include/footer.html');?>
	
</body>
</html>