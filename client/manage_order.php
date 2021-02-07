<?php
include '../include/connection-config.inc.php';
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
    }
	*/
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
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylsheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="client.css">
	<link rel="stylesheet" type="text/css" href="manage_customer.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<script type="text/javascript" charset="utf-8" language="javascript" src="../../upload_download/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../../upload_download/js/DT_bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
<body>
<?php include 'include/header.html';?>
	
	<br/><br/>
	<!--Items details with customers name and ID-->
	<div class="container pt-2">
	<!--responsive table that can fit into any screen size-->
		<div class="table-responsive-sm-6">
			<table class="table table-striped" id="myTable">
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
				<tbody>
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
								//$fileName = "order_customer[$fileCount].html";
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
				<!--- sort date---!>
				<?php
				function clearContent(){
					$empty = "";
					?>
					<script>
					document.getElementById("myTable").innerHTML = "<?php $empty ?>";
					</script>
					
					<?php
				}
				function sortDate() {
					//connect to database
					$servername = "localhost";
					$serverusername = "root";
					$serverpassword = "";
					$dbname = "digital_print";
					$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);
					$sort1 = "ASC";
					//$sort1 == 'DESC' ? $sort1 = 'ASC' : $sort1 = 'DESC';
					$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID ORDER BY Date $sort1;"; 
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['Date'] . "</td>";
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
						}	
					}
				}

				if (isset($_GET['sortD'])) {
					clearContent();
					sortDate();
				}
				?>
				<!--- sort status---!>
				<?php
				function sortStatus() {
					//connect to database
					$servername = "localhost";
					$serverusername = "root";
					$serverpassword = "";
					$dbname = "digital_print";
					$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);
					$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID ORDER BY Status ASC;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
							while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['Date'] . "</td>";
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
				}

				if (isset($_GET['sortS'])) {
					clearContent();
					sortStatus();
				}
				?>
				<!--- sort Payment_Status---!>
				<?php
				function sortPayment() {
					//connect to database
					$servername = "localhost";
					$serverusername = "root";
					$serverpassword = "";
					$dbname = "digital_print";
					$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);
					$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID ORDER BY Payment_Status ASC;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['Date'] . "</td>";
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
				}

				if (isset($_GET['sortP'])) {
					clearContent();
					sortPayment();
				}
				?>
				<!--- sort total---!>
				<?php
				function sortTotal() {
					//connect to database
					$servername = "localhost";
					$serverusername = "root";
					$serverpassword = "";
					$dbname = "digital_print";
					$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);
					$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID ORDER BY Price ASC;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['Date'] . "</td>";
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
				}

				if (isset($_GET['sortT'])) {
					clearContent();
					sortTotal();
				}
				?>
				
				<?php
				if(isset($_POST['submit'])){
					clearContent();
					$search = $_POST['search'];
					$sql = "SELECT digital_print.Order.CustomerUserID as orderID, digital_print.Order.Date, digital_print.Order.Status, digital_print.Order.Payment_Status, product.Name, digital_print.Order.Price, user.name as user_name FROM digital_print.Order INNER JOIN Customer ON Customer.UserID = digital_print.Order.CustomerUserID INNER JOIN user ON user.ID = customer.UserID INNER JOIN product_in_order on product_in_order.orderID = digital_print.Order.ID INNER JOIN product on product.ID = product_in_order.ProductID WHERE User.Name LIKE '%$search%' OR Product.Name LIKE '%$search%' OR digital_print.Order.Price = '$search' OR product_in_order.OrderID LIKE '%$search%';";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['Date'] . "</td>";
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
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	
	<!--Footer-->
	<?php include './include/footer.html'; ?>

</body>
</html>