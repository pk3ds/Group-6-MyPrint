<?php
	
	require_once "../include/connection-config.inc.php";
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM announcement WHERE Status = 'Accepted' AND CURRENT_TIMESTAMP < End_Date ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)
		
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
	<link rel="stylesheet" type="text/css" href="customer.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
	<!--End-->
</head>
<body>
	<?php include('include/header.php');?>
	
	<!--Content-->
	<div class="container-fluid p-5 backgroundImage">
		<br>
		<!--Carousel-->
		<div id="theCarousel" class="carousel slide" data-ride="carousel"><!--Carousel is a component for cycling through announcements, like a slideshow.-->
			<div class="carousel-inner">
			
				<?php while($row = mysqli_fetch_assoc($result)):?>
				
				<div class="carousel-item active">
					<!--Banner is a visible on all screen size device.-->
					<img class="d-block w-100" src="../file_store/announcement/<?php echo $row["File"]; ?>" alt="banner">
				</div>
				
				<?php endwhile;
					mysqli_close($conn); ?>	
			</div>
			<a class="carousel-control-prev" href="#theCarousel" role="button" data-slide="prev"><!--Previous button on carousel-->
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#theCarousel" role="button" data-slide="next"><!--Next button on carousel-->
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!--End-->
		
		<br><br><br>
	
		<!--Product Content-->
		<div class="container">
	
			<!-- Grid row -->
			<div class="row">
				<div class="col-sm ">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=1"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_A4.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">A4</div>
							</div>
						</a>
					</div>
					<br><br>
				</div>

				<div class="col-sm">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=2"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_Banner.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">Banner</div>
							</div>
						</a>
					</div>				
					<br><br>
				</div>

				<div class="col-sm">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=3"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_Brochure.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">Brochure</div>
							</div>
						</a>
					</div>	
					<br><br>
				</div>				
			</div>
			
			<!-- Grid row -->
			<div class="row">
				<div class="col-sm ">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=4"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_Calendar.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">Calendar</div>
							</div>
						</a>
					</div>
					<br><br>
				</div>
				
				<div class="col-sm">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=5"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_NameCard.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">Name Card</div>
							</div>
						</a>
					</div>		
					<br><br>					
				</div>
				
				<div class="col-sm">
					<div class="productImageContainer">
						<a href ="product_catalog.php?ID=6"><!--User can click anywhere in the productImageContainer to go to the product page-->
							<img src="../img/Homepage_Poster.png" class="img-fluid productImage" alt="Responsive image">
							<div class="textArea">
								<div class="text">Poster</div>
							</div>
						</a>
					</div>	
					<br><br><br>
				</div>	
			</div>
		</div>
	</div>
	
	<?php include('include/footer.html');?>
	
</body>
</html>