<?php
	if(!isset($name)){
		$name = '';
	}
	if(!isset($email)){
		$email = '';
	}
	if(!isset($numPhone)){
		$numPhone = '';
	}
	if(!isset($company)){
		$company = '';
	}
	if(!isset($message)){
		$message = '';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="customer.css">
	<link rel="stylesheet" type="text/css" href="about_us.css">
	<link rel="stylesheet" type="text/css" href="contact_us.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>

	<!--Website navigation bar-->
     <?php
		include './include/header.php';
	 ?>
	
	<!--Bootstrap container to properly allign the content-->
	<div class="container">
		<nav class="text-center"><br/>
			<h2>Digital Printing Shop</h2><br/>
			<div class="p-3 mb-2 bg-light text-dark">
				<nav class="text-left">
				<h6>Address: Multimedia University, Persiaran Multimedia, 63100 Cyberjaya, Selangor, Malaysia</h6><br/>
				<h6>Email: digitalprintingshop@gmail.com</h6><br/>
				<h6>Tel: 012-36123459</h6><br/>
				<h6>Fax: 603 - 8827 4252</h6><br/>
				<h6>Business Hours: 9:00 AM - 5:00 PM (Mon-Fri)</h6><br/>
				</nav>
			</div><br/>
		</nav>
	</div>
		
		<!--Form for submitting a request-->
		<form action="inqueries.php" method="POST">
		<div class="container">
			<h4 class="text-center">Any inqueries:</h4><br/>
			<!-- colour for background-->
				<div class="p-3 mb-2 bg-light text-dark">
					<nav class="text-left">
					<h6>Full name:</h6>
					<input type="text" name="name" class="form-control"><br/>
					<?php if(isset($nameError)){ ?>
						<p style="color:red;"><?php echo $nameError ?></p>
					<?php } ?>
					<h6>Email:</h6>
					<input type="text" name="email" class="form-control"><br/>
					<?php if(isset($emailError)){ ?>
						<p style="color:red;"><?php echo $emailError ?></p>
					<?php } ?>
					<h6>No Phone:</h6>
					<input type="text" name="numPhone" class="form-control"><br/>
					<?php if(isset($numPhoneError)){ ?>
						<p style="color:red;"><?php echo $numPhoneError ?></p>
					<?php } ?>
					<h6>Company:</h6>
					<input type="text" name="company" class="form-control"><br/>
					<?php if(isset($companyError)){ ?>
						<p style="color:red;"><?php echo $companyError ?></p>
					<?php } ?>
					<h6>Message:</h6>
					<input type="text" name="message" class="form-control"><br/>
					<?php if(isset($messageError)){ ?>
						<p style="color:red;"><?php echo $messageError ?></p>
					<?php } ?>
				</div>
		</div>
		<!--Submit request-->
		<nav class="text-center"><br/>
		<button type="submit" name="submit"class="btn btn-primary">Submit</button>&nbsp;
		<button type="reset" name="reset"class="btn btn-danger">Cancel</button>
		</nav><br/>
		</form>	
	<?php
		include './include/footer.html';
	?>
</body>
</html>