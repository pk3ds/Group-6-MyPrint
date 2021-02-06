<?php
	
	require_once "../include/connection-config.inc.php";
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM inquiry";
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
		<h2>Manage Inqueries</h2>
	</div>
	<div class="tab-content">
		<div id="description" class="container tab-pane active"><br>
			<div class="table-responsive-sm">
				<table class="table table-striped table-bordered">
				
	
     <tr>
	 <th>Name</th>
	 <th>Phone Number</th>
	 <th>Message</th>
	 <th>Email</th>
	 <th>Delete Inquiry</th>
	 </tr>
	<?php while($row = mysqli_fetch_assoc($result)):?>
	 
	<tr>
	<td><?php echo $row["Name"]; ?></td>
	<td><?php echo $row["Phone"];?> </td>
	<td><?php echo $row["Message"];?> </td>
	<td><button onclick="window.location.href = 'mailto:<?php echo $row["Email"];?>';">Reply</button> </td>
	<form method="post" action="deleteinquiry.php">
	<input type="hidden" name="inquiryid" value="<?php echo $row["ID"];  ?>">
	<td> <input type="submit" value="Delete" name="deleteinquiry"></td>
	</form>

	</tr>
	<?php endwhile;
	mysqli_close($conn); ?>	
	 
	 </table>
	 </div>
	 </div>
	 </div>
	
	<br><br>
	
	<?php include('include/footer.html');?>
	
</body>
</html>