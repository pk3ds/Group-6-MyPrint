<?php
	include '../include/connection-config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Printing Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styleAbout.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            var table = $('#example').DataTable();
        } );
    </script>

	<link rel="stylesheet" type="text/css" href="client.css">
	<link rel="stylesheet" type="text/css" href="manage_customer.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<!-- <script type="text/javascript" charset="utf-8" language="javascript" src="../../upload_download/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../../upload_download/js/DT_bootstrap.js"></script>
<body> -->
<?php include 'include/header.html';?>
	
	<br/><br/>
	<!--Items details with customers name and ID-->
	<div class="container pt-2">
	<!--responsive table that can fit into any screen size-->
		<div class="table-responsive-sm-6">
			<table class="display table table-striped" id="example">
				<thead>
				<tr>
					<th>Name</th>
					<th>Date</th>
					<th>Order</th>
					<th>Item</th>
					<th>Status</th>
					<th>Payment_Status</th>
					<th>Total</th>
				</tr>
				</thead>
				<tbody id="myTable">
				<div id="content">
						<?php
						//connect to database
							$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
						if($resultCheck > 0){
							$fileCount = 0;
							while($row = mysqli_fetch_assoc($result)){
								$fileCount++;
								echo "<tr>";
								echo "<td>" . $row['user_name'] . "</td>";
								echo "<td>" . $row['Date'] . "</td>";
								$fileName = "order_customer$fileCount.html";
								$destFile = "order_customer.html";
								$createFile = fopen($fileName, "w+");
								fwrite($createFile, $destFile);
								echo '<td><a href="order_customer.php?ID='.$row['orderID'].'">'.$row['orderID'].' </a></td>';
								echo "<td>" . $row['Name'] . "</td>";
								if ($row['Status'] == "Completed"){
									echo "<td style='color:green;'>" . $row['Status'] . "</td>";
								}
								elseif($row['Status'] == "Pending"){
									echo "<td style='color:Orange;'>" . $row['Status'] . "</td>";
								}
								elseif($row['Status'] == "Processing"){
									echo "<td style='color:blue;'>" . $row['Status'] . "</td>";
								}
								elseif($row['Status'] == "Cancelled"){
									echo "<td style='color:red;'>" . $row['Status'] . "</td>";
								}
								if ($row['Payment_Status'] == "Paid"){
									echo "<td style='color:green;'>" . $row['Payment_Status'] . "</td>";
								}
								elseif($row['Payment_Status'] == "Cancelled"){
									echo "<td style='color:red;'>" . $row['Payment_Status'] . "</td>";
								} else {
									echo "<td style='color:orange;'>" . $row['Payment_Status'] . "</td>";
								}
								echo "<td>" . $row['Price'] . "</td>";	
								echo "</tr>";
							}
						}
						?>
				</div>				
				</tbody>
			</table>
		</div>
	</div>
	
	<!--Footer-->
	<?php include './include/footer.html'; ?>

</body>
</html>