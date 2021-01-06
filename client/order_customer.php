<?php
include '../include/connection-config.inc.php';
$id = $_GET['ID'];
/*// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page and if yes then redirect back to welcoe page depend on his role.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../account/login.php");
    exit;
} else {
    if ($_SESSION["role"] == "admin") {
        header("location: ../admin/");
      }
    if ($_SESSION["role"] == "customer") {
        header("location: ../customer/");
      }
    exit;
    } */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styleAbout.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="client.css">
	<link rel="stylesheet" type="text/css" href="manage_customer.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>
	<?php include('include/header.html');?>
	
	<!--Bootstrap class which expands to fill the available width-->
		  <div class="container-fluid p-5">
            <div class="row shadow-sm">
                <div class="col">
				<!--Display for selected ID-->
                    <h2>Order ID <small>- <?php echo $id ?></small></h2>
					<hr>
					<!--Table of order in cart, table's layout can be fit into any screen size-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="8" class="bg-light">
                                        <div>
                                            <p class="d-flex justify-content-center">Order Summary</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-info">
                                        <div class="">Item Name</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Details</div>
                                    </th>
                                    <th class="bg-info">
                                        <div class="">Price</div>
                                    </th>
                                    <th class="bg-info">
                                        <div class="">Quantity</div>
                                    </th>
                                    <th class="bg-info">
                                        <div class="">Total</div>
                                    </th>
									 <th class="bg-info">
                                        <div class="">Download</div>
                                    </th>
                                </tr>
                            </thead>
							    <tbody>
									<tr>
										<td>
											<!--customer bought item type 1-->
											 <h5>Poster</h5>
										</td>
										<td>
										
													<p><span class='font-weight-bold'>Size : 30 x 120 gsm paper</span></p>
										
										</td>
										<td class="align-middle">
					
													
													<div class=''>5</div>
													
										</td>
										<td class="align-middle">
									
													<div class='float-left'>20</div>
									
										</td>
										<td class="align-middle">
							
					
											<div class='float-left'>100</div>
										
										</td>
										<td>
									
													<button><a href="">Download</a></button>
								
			
										</td>
									</tr>
								</tbody>
						</table>
						 <div class="float-right">
					
							
									<span class='text-info font-weight-bolder'>RM:</span>
									<span class='content-small-box-content rightalign' id='disp_product_price'>100</span>
					
								</div>
                   </div>
                   <!-- End -->
               </div>
           </div>
		</div>
		 <!--Details about payment, billing address and date-->
		  <div class="container-fluid p-5">
            <div class="row shadow-sm">
                <div class="col">
					<div class="table-responsive">
							<table class="table">
							<thead>
                                <tr>
                                    <th colspan="6" class="bg-light">
                                        <div>
                                            <p>Payment Details</p>
                                        </div>
                                    </th>
                                </tr>
								<tr>
                                    <th class="bg-info">
                                        <div class="">Account No.</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Details</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Payment</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Date</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Time</div>
                                    </th>
									<th class="bg-info">
                                        <div class="">Billing Address</div>
                                    </th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td>
											<p>9283474917</p>
										</td>
										<td>
											<p><span class="font-weight-bold">Aidil Razak bin Hamdan</span></p>
											<p><span class="font-weight-bold">MAYBANK BERHAD.</span></p>
										</td>
										<td class="align-middle">
											<div class="">Paid</div>
										</td>
										<td class="align-middle">
											<div class="float-left">2020-02-09</div>
										</td>
										<td class="align-middle">
											<div class="float-left">09:28 a.m.</div>
										</td>
										<td class="align-middle">
											<p><span class="font-weight-bold">No 20, Jalan P20</span></p>
											<p><span class="font-weight-bold">F/12, Taman Orkid Desa</span></p>
											<p><span class="font-weight-bold">5330, Wangsa Maju</span></p>
										</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br/><br/>
			<!--Back to Manage Order interface-->
			<a href="manage_order.html" class="btn btn-outline-info float-right">&#8592;Return to Manage Order</a>
			
		</div>
		<!--Footer-->
		<?php include('include/footer.html');?>
</body>
</html>