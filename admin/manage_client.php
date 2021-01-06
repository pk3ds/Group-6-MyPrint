<?php

	if(!isset($name)){
		$name = '';
	}
	if(!isset($password)){
		$password = '';
	}
	if(!isset($email)){
		$email = '';
	}
	
	require_once "../include/connection-config.inc.php";
	// Check connection
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

	$sql = "SELECT * FROM User WHERE Role = 'client'";
	$result = mysqli_query($conn, $sql);

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
	<!--End-->
</head>
<body>
	
	<?php include('include/header.html');?>
	
	<!--Content-->
	<br><br>
	<div class=" text-center mb-0 d-none d-sm-block">
		<h2>Manage Client</h2>
	</div>
	<div class="tab-content">
		<div id="description" class="container tab-pane active"><br>
			<div class="table-responsive-sm">
				<table class="table table-striped table-bordered">
				
	
     <tr>
	 <th>Name</th>
	 <th>Email Address</th>
	 <th>Last Login Status</th>
	 <th>Remove Client</th>
	 </tr>
	<?php while($row = mysqli_fetch_assoc($result)):?>
	 
	<tr>
	<td><?php echo $row["Name"]; ?></td>
	<td><?php echo $row["Email"];?>  </td>
	<td><?php echo $row["Last_Login"];?> </td>
	<td><a href=<?php echo "'deleteClient.php?id=".$row['ID']."'"; ?>><button class="btn"><i class="fa fa-trash"></i></button></a></td>
	</tr>

	 
	<?php endwhile;
	mysqli_close($conn); ?>	
	 
	 </table>
	 </div>
	 </div>
	 </div>
	
	<div class="col-md-4 ">
		<h3>Add Client</h3>
		<form method="post" action="addClient.php">
			<div class="form-group row">
				<label for="nameID" class="col-sm-5 col-form-label">Name:</label>
				<div class="col-sm-7 p-1">	
					<input type="text" class="form-control" id="nameID" name="name" placeholder="Name"><!--Bootstrap form style-->
					<?php if(isset($nameError)){ ?>
						<p style="color:red;"><?php echo $nameError ?></p>
					<?php } ?>
				</div>
				<label for="passwordID" class="col-sm-5 col-form-label">Password:</label>
				<div class="col-sm-7 p-1">	
					<input type="password" class="form-control" id="passwordID" name="password" placeholder="abc123">
					<?php if(isset($passwordError)){ ?>
						<p style="color:red;"><?php echo $passwordError ?></p>
					<?php } ?>
				</div>
				<label for="emailID" class="col-sm-5 col-form-label">Email:</label>
				<div class="col-sm-7 p-1">	
					<input type="email" class="form-control" id="emailID" name="email" placeholder="name@gmail.com">
					<?php if(isset($emailError)){ ?>
						<p style="color:red;"><?php echo $emailError ?></p>
					<?php } ?>
				</div>		
			</div>
			<button type="submit" class="btn btn-primary float-right">Add</button>
			<hr class="d-block">
		</form><br>
	</div>	
	
	<br><br>

	<?php include('include/footer.html');?>
	
</body>
</html>

