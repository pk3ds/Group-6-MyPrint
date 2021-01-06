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
		<!--Bootstrap: container-fluid = width is set to 100%, p-5 = padding is set to 5-->
        <div class="container-fluid p-5">
            <div class="collumn">
			<!-- Bootstrap: col-xs-1 = collumn width size is set to 1 when screen is default -->
			<div class="col-xs-1">
				<h2>Request Quote </h2>
				<!-- Bootstrap: d-block = display block element-->
				<hr class="d-block">
				<!-- Bootstrap: shadow-sm = shadow set to small, p-2 = padding is set to 2 = display block element-->
				<form enctype="multipart/form-data" action="request_quote_inqueries.php" method="POST" class="shadow-sm p-2">
					<div class="form-group row">
					<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label class="col-sm-5 col-form-label">Quote Title:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="title">
						</div>
						
						<!-- Error Template-->
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($titleError)){ ?>
						<p style="color:red;">
						<?php echo $titleError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						
						<label  class="col-sm-5 col-form-label">Product Type:</label>
							<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
							<div class="col-sm-6 p-2">
							 <input type="radio" name="product_type"  value="Existing"> Existing <br>
							 <input type="radio" name="product_type" value="custom"> Custom <br>
							</div> 
					   <label for="product_name" class="col-sm-5 col-form-label">Product Name:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="product_name">
						</div>
						
						<!-- Error Template-->
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($product_nameError)){ ?>
						<p style="color:red;">
						<?php echo $product_nameError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						
						<label  class="col-sm-5 col-form-label">Quantity :</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="quantity">
						</div>
						<!-- Error Template-->
						
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($quantityError)){ ?>
						<p style="color:red;">
						<?php echo $quantityError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						
						<label class="col-sm-5 col-form-label">Shipping:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<select class="form-control" name="shipping">
								<option name="shipping" class="active" value="Self_Collect">Self Collect</option>
								<option name="shipping" class="active" value="Courier_Service">Courier Service</option>
							</select>
						</div>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label name="size" class="col-sm-5 col-form-label">Size:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="size">
						</div>
						<!-- Error Template-->
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($sizeError)){ ?>
						<p style="color:red;">
						<?php echo $sizeError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label class="col-sm-5 col-form-label">Paper Type:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="paper_type">
						</div>
						<!-- Error Template-->
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($sizeError)){ ?>
						<p style="color:red;">
						<?php echo $sizeError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label class="col-sm-5 col-form-label">Side/Pages:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" class="form-control" name="side_pages">
						</div>
						<!-- Error Template-->
						<label class="col-sm-5 col-form-label"></label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
						<?php if(isset($side_pagesError)){ ?>
						<p style="color:red;">
						<?php echo $side_pagesError ?></p>
						<?php } ?>
						</div>
						<!-- Error Template-->
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label name="coating" class="col-sm-5 col-form-label">Coating:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<select class="form-control" name="coating">
								<option name="coating" class="active" value="matte">Matte</option>
								<option name="coating" class="active" value="gloss">Gloss</option>
								<option name="coating" class="active" value="spotuv">Spot UV</option>
							</select>
						</div>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label class="col-sm-5 col-form-label">Colour:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<select class="form-control" name="color">
								<option name="color" class="active" value="4c_4c">4c x 4c</option>
								<option name="color" class="active" value="4c_0c">4c x 0c</option>
								<option name="color" class="active" value="1c_1c">1c x 1c</option>
								<option name="color" class="active" value="1c_0c">1c x 0c</option>
						</select>
						</div>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label name="lamination" class="col-sm-5 col-form-label">Lamination:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<select class="form-control" name="lamination">
								<option name="lamination" class="active" value="none">None</option>
								<option name="lamination" class="active" value="matte">Matte</option>
								<option name="lamination" class="active" value="gloss">Gloss</option>
						</select>
						</div>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px-->
						<label class="col-sm-5 col-form-label">Additional Details:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<input type="text" name="add_details" class="form-control" name="add_details">					
						</div>
						<!-- Bootstrap: collumn width is set to 5 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<label class="col-lg-5 col-form-label float-right">Upload Artwork:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						
						<div class="col-sm-6 p-2">
							<input type="file" name="file"><br>
							
						</div>
						
						<div class="container-fluid">
							<input type="submit" name="submit" class="btn btn-primary float-right btn-sm">
							<a href="home.html" class="btn btn-info btn-sm float-left" role="button">Back</a>
						</div>
					</div>
					
				</form>
				<!-- Bootstrap: d-block = display block element-->
				<br><hr class="d-block"><br>
                </div>
            </div>
        </div>
    
	<!--Footer-->
	<!-- Bootstrap: Jumbotron is lightweight, flexible component for showcasing hero unit style content-->
	<footer class="jumbotron mb-0">
	  <!-- Footer Content -->
	  <!-- Bootstrap: Provides full width container with text alligned towards the left-->
	  <div class="container-fluid text-left">

		<!-- Grid row -->
		<div class="row">

		  <!-- Grid column -->
		  <!--For medium device or bigger, width for column is 6 and margin top is 0. For device smaller then medium, margin top is 3-->
		  <div class="col-md-6 mt-md-0 mt-3">

			<!-- Content -->
			<h5 class="text-uppercase">Contact Information</h5>
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

		  <!-- Grid column -->
		  <!--For medium device or bigger, width for column is 3 and margin bottom is 0. For device smaller then medium, margin bottom is 3-->
		  <div class="col-md-3 mb-md-0 mb-3">

			<!-- Links -->
			<h5 class="text-uppercase">Information</h5>

			<ul class="list-unstyled">
			  <li>
				<a style="color:black;" href="#!">Download Templates</a>
			  </li>
			  <li>
				<a style="color:black;" href="#!">Testimonial</a>
			  </li>
			  <li>
				<a style="color:black;" href="#!">Privacy & Security Policy</a>
			  </li>	
			  <li>
				<a style="color:black;" href="#!">FAQS</a>
			  </li>
			  <li>
				<a style="color:black;" href="request_quote.html">Request a Quote</a>
			  </li>
			  <li>
				<a style="color:black;" href="#!">Terms & Condition</a>
			  </li>		  
			</ul>

		  </div>

		  <!-- Grid column -->
		  <!--For medium device or bigger, width for column is 3 and margin bottom is 0. For device smaller then medium, margin bottom is 3-->
		  <div class="col-md-3 mb-md-0 mb-3">

			<!-- Links -->
			<h5 class="text-uppercase">Products</h5>

			<ul class="list-unstyled">
			  <li>
				<a style="color:black;" href="product/product_A4.html">A4</a>
			  </li>
			  <li>
				<a style="color:black;" href="product/product_banner.html">Banner</a>
			  </li>
			  <li>
				<a style="color:black;" href="product/product_brochure.html">Brochure</a>
			  </li>
			  <li>
				<a style="color:black;" href="product/product_calendar.html">Calendar</a>
			  </li>
			  <li>
				<a style="color:black;" href="product/product_namecard.html">Name Card</a>
			  </li>
			  <li>
				<a style="color:black;" href="product/product_poster.html">Poster</a>
			  </li>
			</ul>

		  </div>
		</div>
	  </div>
	</footer>
	</body>

</html>
