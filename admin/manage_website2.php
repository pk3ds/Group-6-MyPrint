<?php

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


require_once "../include/connection-config.inc.php";


$sql1 = "SELECT * FROM digital_print.order";
$sql = "SELECT * FROM product_in_order";
$sql2 = "SELECT COUNT(*) as totalorders FROM  digital_print.order";
$sql3 = "SELECT SUM(Price) as totalsales FROM  digital_print.order";
$sql4 = "SELECT COUNT(*) as newcustomer FROM User WHERE Role='Customer'";
$sql5 = "SELECT COUNT(*) as calendar FROM  product_in_order WHERE ProductID=4";
$sql6 = "SELECT COUNT(*) as a4 FROM  product_in_order WHERE ProductID= 1";
$sql7 = "SELECT COUNT(*) as banner FROM  product_in_order WHERE ProductID=2";
$sql8 = "SELECT COUNT(*) as posture FROM  product_in_order WHERE ProductID=6";
$sql9 = "SELECT COUNT(*) as brochure FROM  product_in_order WHERE ProductID=3";
$sql10 = "SELECT COUNT(*) as namecard FROM  product_in_order WHERE ProductID=5";
$sql11 = "SELECT COUNT(*) as q1 FROM User WHERE Date_Join BETWEEN '2020-01-31' AND '2020-03-31' AND Role='Customer'";
$sql12 = "SELECT COUNT(*) as q2 FROM User WHERE Date_Join BETWEEN '2020-04-31' AND '2020-06-31' AND Role='Customer'";
$sql13 = "SELECT COUNT(*) as q3 FROM User WHERE Date_Join BETWEEN '2020-07-31' AND '2020-09-31' AND Role='Customer'";
$sql14 = "SELECT COUNT(*) as q4 FROM User WHERE Date_Join BETWEEN '2020-10-31' AND '2020-12-31' AND Role='Customer'";
$sql15 = "SELECT COUNT(*) as visitor FROM Inquiry WHERE UserId='guest'"; 


$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);
$result5 = mysqli_query($conn, $sql5);
$result6 = mysqli_query($conn, $sql6);
$result7 = mysqli_query($conn, $sql7);
$result8 = mysqli_query($conn, $sql8);
$result9 = mysqli_query($conn, $sql9);
$result10 = mysqli_query($conn, $sql10);
$result11 = mysqli_query($conn, $sql11);
$result12 = mysqli_query($conn, $sql12);
$result13 = mysqli_query($conn, $sql13);
$result14 = mysqli_query($conn, $sql14);
$result15 = mysqli_query($conn, $sql15);



  


?>



















<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />          <!--Bootstrap link-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="admin.css"/>
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>
<!--Header-->
	
	<?php include "./include/header.html"; ?>

	<div class=" text-center mb-0 d-none d-sm-block">                               <!--Bootstrap class for header-->
	<h2>Manage Website</h2>
	</div>
	<br>
	
	
   
 
   
   <?php
   function percentage($dup,$ori)
   {
	   $res=($ori-$dup)/$dup  ;
	   echo $res ;
   }
   ?>
   
  
	
	
	<!--divisions for website details-->
	 <div class="d-flex justify-content-center">        	 <!--Bootstrap class flexible box layout-->
	 
	 <?php while($row1= mysqli_fetch_assoc($result1)):?>
     <?php while($row2= mysqli_fetch_assoc($result2)):?>
     <?php while($row3= mysqli_fetch_assoc($result3)):?>
     <?php while($row4= mysqli_fetch_assoc($result4)):?>
     <?php while($row15= mysqli_fetch_assoc($result15)):?>	 
	 
	<div class="details"  >         <!--CSS styling for the division -->
	 <h4>Sales</h4> 
     RM<?php echo $row3["totalsales"];?><br>
	 <img class="img-responsive" alt="green" src="../img/<?php  if($_POST["expectedsales"] <=$row3["totalsales"])echo "greenarrow" ;else echo "redarrow"; ?>.jpg" width="50" >  	 <!--Bootstrap class for image automatically adjust to size of screen -->
    
	<?php percentage($_POST["expectedsales"], $row3["totalsales"])?>	%
	</div>
	<div class="details" >
	 <h4>New Customer</h4>
     <?php echo $row4["newcustomer"];?><br> 
	 <img class="img-responsive" alt="green" src="../img/<?php  if($_POST["expectedcustomer"] <=$row4["newcustomer"])echo "greenarrow" ;else echo "redarrow"; ?>.jpg" width="50" >
    
	<?php percentage($_POST["expectedcustomer"], $row4["newcustomer"])?>	%
	 </div>
	 <div class="details" >
	 <h4>Visitor</h4>
     <?php echo $row15["visitor"];?><br>
	 <img class="img-responsive" alt="green" src="../img/<?php  if($_POST["expectedvisitor"] <=$row15["visitor"])echo "greenarrow" ;else echo "redarrow"; ?>.jpg" width="50" >
	 23%
     </div>
	<div class="details" >
	 <h4>Total Orders</h4>
    <?php echo $row2["totalorders"];?><br>
	 <img class="img-responsive" alt="green" src="../img/<?php  if($_POST["expectedorders"] <=$row2["totalorders"])echo "greenarrow" ;else echo "redarrow"; ?>.jpg" width="50" >
	
	<?php percentage($_POST["expectedorders"], $row2["totalorders"])?>	%
	 </div>
	 <br>
	 </div>
	  
	
	
	
	

	 
	 <?php 
	 endwhile;
	 endwhile;
	 endwhile;
	 endwhile;
	 endwhile;
	  ?>
	  
	  
	  
	  
	  
	
	 
	 
	<script>
window.onload = function () {
	
	 <?php while($row5= mysqli_fetch_assoc($result5)):?>
     <?php while($row6= mysqli_fetch_assoc($result6)):?>
     <?php while($row7= mysqli_fetch_assoc($result7)):?>
     <?php while($row8= mysqli_fetch_assoc($result8)):?>
     <?php while($row9= mysqli_fetch_assoc($result9)):?>
     <?php while($row10= mysqli_fetch_assoc($result10)):?>	 
	
	
	
	var calendar = parseInt(" <?php echo $row5["calendar"];?> " ) ;
	var a4 = parseInt(" <?php echo $row6["a4"];?> " ) ;
	var banner = parseInt(" <?php echo $row7["banner"];?> " ) ;
	var posture = parseInt(" <?php echo $row8["posture"];?> " ) ;
	var brochure = parseInt(" <?php echo $row9["brochure"];?> " ) ;
	var namecard = parseInt(" <?php echo $row10["namecard"];?> " ) ;
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Total Product Sales"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Sales"
	},
	data: [{
		type: "bar",
		name: "sales",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: [
			{ y: calendar, label: "Calendar" },
			{ y: a4, label: "A4" },
			{ y: banner, label: "Banner" },
			{ y: posture, label: "Poster" },
			{ y: brochure, label: "Brochure" },
			{ y: namecard, label: "Namecard" },
			
			
		]
	}]
});
chart.render();

     <?php 
	 endwhile;
	 endwhile;
	 endwhile;
	 endwhile;
	 endwhile;
	 endwhile;
	 mysqli_close($conn); ?>

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	 <br><br><br>
	
     <!--table for number of new customers-->
	<div class=" text-center mb-0 d-none d-sm-block">
	<h2>Number of New Customers per Quater</h2>
	</div>
	 
      <div class="tab-content">
		<div id="description" class="container tab-pane active"><br>
			<div class="table-responsive-sm">                                          <!--Only visible on 768px and up screen-->
				<table class="table table-striped table-bordered">	                   <!--Bootstrap class for striped table-->
	
     <tr>
	 <th>Q1</th>
	 <th>Q2</th>
	 <th>Q3</th>
	 <th>Q4</th>
	 </tr>
	 
	 <?php while($row11= mysqli_fetch_assoc($result11)):?>	
	 <?php while($row12= mysqli_fetch_assoc($result12)):?>	
	 <?php while($row13= mysqli_fetch_assoc($result13)):?>	
	 <?php while($row14= mysqli_fetch_assoc($result14)):?>	

	 
	 
	 <tr>
	 <td><?php echo $row11["q1"];?></td>
	 <td><?php echo $row12["q2"];?></td>
	 <td><?php echo $row13["q3"];?></td>
	 <td><?php echo $row14["q4"];?></td>
	 </tr>
	 
	 
	 <?php 
	 endwhile;
	 endwhile;
     endwhile;
	 endwhile;
	 ?>
	 
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