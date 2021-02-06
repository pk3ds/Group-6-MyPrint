<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page and if yes then redirect back to welcoe page depend on his role.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../account/login.php");
    exit;
} else {
	if ($_SESSION["role"] == "admin") {
		header("location: ../admin/");
	} 
    if ($_SESSION["role"] == "customer") {
		header("location: ../customer/");
	}
}

require_once "../include/connection-config.inc.php";

$sql = "SELECT * FROM Quote";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
  


?>


















<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />        <!--Bootstrap link-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="client.css"/>
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>
	<!--Header-->
	
	
	
	<?php include "./include/header.html"; ?>
	

	<!--Header-->
	<div class=" text-center mb-0 d-none d-sm-block">                             <!--Bootstrap class for header-->
	<h2>Manage Quote</h2>
	</div>
	<!--Table for quote send by customer-->
    <div class="tab-content">
		<div id="description" class="container tab-pane active"><br>              <!--Bootstrap class ford ifferent panes where each pane is viewable one at a time-->
			<div class="table-responsive-sm">                                     <!--Only visible on 768px and up screen-->
				<table class="table table-striped table-bordered">	              <!--Bootstrap class for striped table-->
	
     <tr>
	 <th>Quote ID</th>
	 <th>Quote received date</th>
	 <th>Details</th>
	 <th>Delete Quote</th>
	 </tr>
	 
	 <?php while($row = mysqli_fetch_assoc($result)):?>
	 
	 <tr>
	 <td><?php echo $row["ID"]; ?></td>
	 <td><?php echo $row["Date"]; ?></td>
	 <form action='manage_quote2.php?ID="<?php echo $row["ID"]; ?>"' method="post">
	 <input type="hidden" name="ID" value="<?php echo $row["ID"];  ?>">
	 <td> <input type="submit" value="View Details"></td>   <!--button for manage_quote page-->
	 <a href=<?php echo "'download.php?ID=".$row['ID']."'"; ?>></a></td>
	 </form>
	 <form method="post" action="deletequote.php">
	 <input type="hidden" name="quoteid" value="<?php echo $row["ID"];  ?>">
	 <td><button name="deletequote" class="btn"><i class="fa fa-trash"></i></button></td>
	 </form>
	 </tr>
	 <?php endwhile; 
	 mysqli_close($conn); ?>
	 
	 </table>
	 
	 </div>
	 </div>
	 </div>
	 
						
			



<!--Footer-->
<footer class="jumbotron mb-0 "><!--Jumbotron is lightweight, flexible component for calling extra attention-->
  <!-- Footer Content -->
  <div class="container-fluid text-left"><!--Provides full width container with text alligned towards the left-->

        <!-- Content -->
		<div class="row">
			<h5 class="text-uppercase">Contact Information</h5>
		</div>
		<div class="row">
			<p><b>Main address:</b><br>Multimedia University, Persiaran Multimedia, <br>63100 Cyberjaya, Selangor, Malaysia </p>
		</div>
		
		<div class="row">
			<p><b>Tel:</b> 012-36123459</p>
		</div>
		
		<div class="row">
			<p><b>E-mail:</b> digitalprintingshop@gmail.com</p>
		</div>
		
		<div class="row">
			<p><b>Business Hours:</b> 9:00 AM - 5:00 PM (Mon-Fri)</p>
		</div>
		</div>
		
		<!-- Copyright -->
		<div class="footer-copyright text-left py-3">©Copyright 2020. All Rights Reserved
		</div>
</footer>
</body>



</html>