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

$sql = "SELECT * FROM Quote WHERE ID={$_POST["ID"]}";
$result = mysqli_query($conn, $sql);

/*$sql1 = "SELECT CustomerUserId FROM Quote WHERE ID={$_POST["ID"]}";
$result = mysqli_query($conn, $sql1);
	while($row = mysqli_fetch_assoc($result)):
	
		$userid = $row["CustomerUserId"];
	endwhile;*/
	
/*$sql2 = "SELECT * FROM User WHERE ID= $userid";

$result2 = mysqli_query($conn, $sql2);
	while($row = mysqli_fetch_assoc($result2)):
	
		$email = $row["Email"];
	endwhile;*/
	

	
	
   

     
	
	






//if (mysqli_num_rows($result) > 0) 
  


?>


  











<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />     <!--Bootstrap link-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="client.css"/>
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>
	<!--Header-->
	
	<?php include "./include/header.html"; ?>
	
	

	<!--Header-->
	<div class=" text-center mb-0 d-none d-sm-block">                        <!--Bootstrap class for header-->
	<h2>Manage Quote</h2>
	<br>
	<h3>Details</h3>
	<br>
	</div>
	<!--Table for quote details-->
	<div class="tab-content">
		<div id="description" class="container tab-pane active"><br>       <!--Bootstrap class ford ifferent panes where each pane is viewable one at a time-->
			<div class="table-responsive-sm">                             <!--Only visible on 768px and up screen-->
				<table class="table table-striped table-bordered">        <!--Bootstrap class for striped table-->
		

     <?php while($row= mysqli_fetch_assoc($result)):?>		
     <tr>
	 <th>Quote ID</th>
	 <td><?php echo $row["ID"]; ?></td>
	 </tr>
	 <tr>
	 <th>Quote Title</th>
	 <td><?php echo $row["Title"]; ?></td>
     </tr>
	 <tr>
	 <th>Product type</th>
	 <td><?php echo $row["Product_Type"]; ?></td>
	 </tr>
	 <tr>
	 <th>Product Name</th>
	 <td><?php echo $row["Product_Name"]; ?></td>
	 </tr>
	 <tr>
	 <th>Quantity</th>
	 <td><?php echo $row["Quantity"]; ?></td>
	 </tr>
	 <tr>
	 <th>Shipping</th>
	 <td><?php echo $row["Shipping"]; ?></td>
	 </tr>
	 <tr>
	 <th>Size</th>
	 <td><?php echo $row["Size"]; ?></td>
	 </tr>
	 <tr>
	 <th>Paper type</th>
	 <td><?php echo $row["Paper_Type"]; ?></td>
	 </tr>
	 <tr>
	 <th>Sides Pages</th>
	 <td><?php echo $row["Side_Pages"]; ?></td>
	 </tr>
	 <tr>
	 <th>Coating</th>
	 <td><?php echo $row["Coating"]; ?></td>
	 </tr>
	 <tr>
	 <th>Color</th>
	 <td><?php echo $row["Color"]; ?></td>
	 </tr>
	 <tr>
	 <th>Lamination</th>
	 <td><?php echo $row["Lamination"]; ?></td>
	 </tr>
	 <tr>
	 <th>Additional Details</th>
	 <td><?php echo $row["Add_Details"]; ?></td>
	 </tr>
	 
	  <?php
	  $Quote=  $row["File"];
      
	  ?>
	 
	 <?php endwhile;
	 ?>
	 
	 
	 </table>
	 
	  
	  
	  <button><a href='<?php echo 'download.php?file='.$Quote;?>'>Download</a></button>
	  
	 
	 
	  <!--button for back to manage_quote2 page and download-->
	  <button id="back"  onclick="window.location.href = 'manage_quote.php';">Back</button>
	 
	
	  <!--button for reply customer-->
	  <div id="reply" >
	    <!--<button  onclick="window.location.href = 'mailto:abc@example.com';">Reply</button> -->
		
		
		<td><button onclick="window.location.href = 'mailto:<?php echo $email ;?>';">Reply</button> </td>
	
	 

	  </div>
	  
	  
	  
	 
	 </div>
	 </div>
	 </div>
	 <br>

	 
						
			


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