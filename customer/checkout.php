<?php 
	// Initialize the session
	session_start();
 
	// Check if the user is logged in, if not then redirect him to login page and if yes then redirect back to welcoe page depend on his role.
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../account/login.php");
		exit;
	} else {
		if ($_SESSION["role"] == "admin") {
			header("location: ../admin/");
			exit;
		}
		if ($_SESSION["role"] == "client") {
			header("location: ../client/");
			exit;
		}
	}

	require_once "../include/connection-config.inc.php";


	$sql = 'SELECT product_in_order.name, product.Name, product_in_order.Detail, product_in_order.Price, product_in_order.Quantity from digital_print.order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.OrderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE User.id = ?';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Digital Printing Shop</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!--Sets the initial zoom level when the page is first loaded by the browser-->
		<!--Include online Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="checkout.css" />
		<link rel="stylesheet" href="../customer.css" />
		<link rel="stylesheet" type="text/css" href="customer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="icon" href="../img/logo.jpg" type="image/icon">
		<!--End-->
    </head>
    <body>
        <!--Header-->
		<?php include_once ('include/header.php');?>
		<!--End-->
		<!--End-->
        <!--Content-->
        <div class="container-fluid p-5"><!--Fluid container padding 5px-->
            <div class="row shadow-sm roundedContainer"><!--Grid positioning shadow visible to screen sm and up-->
                <div class="col">
                    <h2>Cart <small>- Checkout</small></h2>
					<hr>
					<!--Table of order in cart-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="bg-light">
                                        <div>
                                            <p class="d-flex justify-content-center">Order Details</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-info" id="roundedBottomLeft">
                                        <div class="">Products</div>
                                    </th>
                                    <th class="bg-info">
                                        <div class="">Additional Information</div>
                                    </th>
                                    <th class="bg-info">
                                        <div class="">Price</div>
                                    </th>
                                    <th class="bg-info" id="roundedBottomRight">
                                        <div class=" float-right">Quantity</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									$sql = "SELECT order.Id, product_in_order.id, product_in_order.name, product.Name, product_in_order.Detail, product_in_order.Price, product_in_order.Quantity from digital_print.order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.OrderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE User.id = ? AND digital_print.order.payment_status != 'Paid'";
									$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$stmt = $pdo -> prepare($sql);
									$stmt -> bindValue(1, $_SESSION['username']);
									$stmt -> execute();
									while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
										$orderID = $user['Id'];
								?>
                                <tr>
                                    <td class="align-middle">
										<h4><?php echo $user['name']; ?></h4>
                                    </td>
                                    <td>
                                        <h5><?php echo $user['Name']; ?></h5>
										<?php echo $user['Detail']; ?>
										<form action="./deleteCheckout.php" method="get">
											<button name="delete" type="submit" class="btn btn-outline-danger" value="<?php echo $user['id'] ?>">Delete</button>
										</form>
                                    </td>
									<td class="align-middle">
										<div class="">RM <?php echo $user['Price']; ?></div>
									</td>
									<td class="align-middle">
										<div class="float-right"><?php echo $user['Quantity']; ?></div>
									</td>
                                </tr>
                               
									<?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <div class="row py-5 p-4">
                <div class="col-md-6">
				<!--Coupon-->
                    <div class="smallHeader">Voucher Code</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Enter voucher code to enjoy discounts!</p>
                        <div class="input-group mb-4 border p-2 roundedContainer">
                            <input type="text" placeholder="Apply voucher" aria-describedby="voucher_code"
                            class="form-control border-0 mr-3" />
                            <div class="input-group-append border-0 float-right">
                                <button id="voucher_code" type="button" class="btn btn-dark roundedContainer float-right" onclick="">
									Apply voucher
								</button>
                            </div>
                        </div>
                    </div>
				<!--End-->
					<!--Instruction from user for vendor-->
                    <div class="smallHeader">Instructions for Seller</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">
							Anything to inform us before finishing the payment?
						</p>
                        <textarea name="instruction" cols="30" rows="2" class="form-control roundedContainer"></textarea>
                    </div>
					<!--End-->
                </div>
				<!--Select Address-->
                <div class="col-md-6">
					<div class="smallHeader">Address</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">
							Choose address of delivery.
						</p>
                        <select class="form-control" id="address" name="address">
							<option class="active" value="0">Self-collect - RM0.00</option>
							<option class="" value="1">Address 1 - RM12.54</option>
						</select>
                    </div>
				<!--End-->
				<!--Order summary-->
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom">
								<strong>Order Subtotal</strong> 
								<strong>RM269.00</strong>
							</li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
								<strong>Shipping and handling</strong> 
								<strong>RM0.00</strong>
							</li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
								<strong>Tax</strong> 
								<strong>RM23.00</strong>
							</li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong>Total</strong>
                                <h5 class="font-weight-bold">RM292.00</h5>
                            </li>
                        </ul>
						<p class="font-italic mb-4">
							Shipping and additional costs are calculated based on values you have entered.
						</p>
                    </div>
					<a href="../customer" class="btn btn-outline-info float-left">&#8592;Continue shopping</a>
					<a href="./proceedCheckout.php?orderID=<?php echo $orderID; ?>" class="btn btn-outline-info float-right">Proceed to checkout&#x2192;</a>
				<!--End-->
                </div>
			</div>
        </div>
		<!--Footer-->
		<footer class="jumbotron mb-0"><!--Jumbotron is lightweight, flexible component for calling extra attention-->
			<!-- Footer Content -->
			<div class="container-fluid text-left"><!--Provides full width container with text alligned towards the left-->

				<!-- Grid row -->
				<div class="row">

					<!-- Grid column -->
					<div class="col-md-6 mt-md-0 mt-3"><!--For medium device or bigger, width for column is 6 and margin top is 0. For device smaller then medium, margin top is 3-->

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

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3"><!--For medium device or bigger, width for column is 3 and margin bottom is 0. For device smaller then medium, margin bottom is 3-->

						<!-- Links -->
						<h5 class="text-uppercase">Information</h5>

						<ul class="list-unstyled">
							<li>
								<a class = "footerLink" href="#!">Download Templates</a>
							</li>
							<li>
								<a class = "footerLink" href="#!">Testimonial</a>
							</li>
							<li>
								<a class = "footerLink" href="#!">Privacy & Security Policy</a>
							</li>	
							<li>
								<a class = "footerLink" href="#!">FAQS</a>
							</li>
							<li>
								<a class = "footerLink" href="request_quote.html">Request a Quote</a>
							</li>
							<li>
								<a class = "footerLink" href="#!">Terms & Condition</a>
							</li>		  
						</ul>
					</div>

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3"><!--For medium device or bigger, width for column is 3 and margin bottom is 0. For device smaller then medium, margin bottom is 3-->

						<!-- Links -->
						<h5 class="text-uppercase">Products</h5>

						<ul class="list-unstyled">
							<li>
								<a class = "footerLink" href="product/product_A4.html">A4</a>
							</li>
							<li>
								<a class = "footerLink" href="product/product_banner.html">Banner</a>
							</li>
							<li>
								<a class = "footerLink" href="product/product_brochure.html">Brochure</a>
							</li>
							<li>
								<a class = "footerLink" href="product/product_calendar.html">Calendar</a>
							</li>
							<li>
								<a class = "footerLink" href="product/product_namecard.html">Name Card</a>
							</li>
							<li>
								<a class = "footerLink" href="product/product_poster.html">Poster</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
					<!-- Copyright -->
				<div class="footer-copyright text-left py-3">©Copyright 2020. All Rights Reserved
				</div>
		</footer>
    </body>
</html>
