<?php
	if(!isset($title)){
		$title = '';
	}
	if(!isset($message)){
		$message = '';
	}
	if(!isset($enddate)){
		$enddate = '';
	}
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
	<link rel="stylesheet" type="text/css" href="client.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
	<!--End-->
</head>
<body>
		<?php include('include/header.html');?>
        <!--Content-->
        <div class="container-fluid p-5">
            <div class="collumn">
			<div class="col-xs-1" align="left">
				<h2>Request Announcement</h2>
				<hr class="d-block">
				<form enctype="multipart/form-data" action="request_announcement_inqueries.php" method="POST" class="shadow-sm p-2">
					<div class="form-group row">
						
						<label  class="col-sm-5 col-form-label">Announcement Title :</label>
						<div class="col-sm-6 p-2">	
							<input class="form-control" type="text" name="title">
						</div>
						<label  class="col-sm-5 col-form-label"></label>
						<div class="col-sm-6 p-2">	
						
						<?php if(isset($titleError)){ ?>
						<p style="color:red;">
						<?php echo $titleError ?></p>
						<?php } ?>
		
						</div>
						<label  class="col-sm-5 col-form-label">Message :</label>
						<div class="col-sm-6 p-2">	
							<textarea rows="5" class="form-control" type="text" name="message"> </textarea>
						</div>
						<label  class="col-sm-5 col-form-label"></label>
						<div class="col-sm-6 p-2">	
						</div>

						<label  class="col-sm-5 col-form-label">End Date:</label>
											  <div class="col-sm-6 p-2">
												  <input type="date" name="enddate">
												</div>
						<label  class="col-sm-5 col-form-label">File Upload:</label>
						
						<div class="col-sm-6 p-2">
				
							<input type="File" name="file" id="file"><br>
						</div>
						<div class="container-fluid">
							<input type="submit" name="submit" class="btn btn-primary float-right btn-sm">
							<a href="client_homepage.html" class="btn btn-info btn-sm float-left" role="button">Back</a>
						</div>
					</div>
				</form>
				<!-- Bootstrap: d-block = display block element-->
				<br><hr class="d-block"><br>
                </div>
            </div>
        </div>
    </body>
	<!--Footer-->
	<!-- -->
	<footer class="jumbotron mb-0 ">
	  <!-- Footer Content -->
	  <div class="container-fluid text-left">

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

</html>



