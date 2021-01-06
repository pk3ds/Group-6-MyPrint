<!DOCTYPE html>
<?php 
 require_once "../include/connection-config.inc.php"; 
?>
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
	<link rel="stylesheet" type="text/css" href="client.css">
	<link rel="stylesheet" type="text/css" href="manage_customer.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
</head>
<body>

	<?php include('include/header.html');?>
	<!--Search button for items-->
	<div class="container">
	<!--right-alligned-->
		<br>
		<div class="float-right">
					<div class="col-12">
						<div class="input-group">
						<form action="" method="POST">
							<input class="form-control border-secondary py-2" type="text" name="search" value="search">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" href="manage_announcement.php?displaySearch=true" type="submit" name="submit"><img src="search.png" style="height:20px">
								<i class="fa fa-search"></i>
								</button>
							</div>
						</form>
						</div>
					</div>
		</div>
	</div>
	<br/><br/>

	<!--Items details with customers name and ID-->
	<div class="container pt-2">
	<!--responsive table that can fit into any screen size-->
		<div class="table-responsive-sm-6">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>Author Name</th>
					<th>Date of Submission</th>
					<th>Announcement Title</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody id="myTable">
				<div id="content">
						<?php
						//connect to database
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
							announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
							FROM announcement INNER JOIN user ON user.ID = announcement.UserID";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
						if($resultCheck > 0){
							$fileCount = 0;
							while($row = mysqli_fetch_assoc($result)){
								//$fileCount++;
								echo "<tr>";
								echo '<td><a href="manage_announcementdetails.php?ID='.$row['ID'].'">'.$row['ID'].' </a></td>';
								echo "<td>" . $row['Name']. "</td>";
								echo "<td>" . $row['Submission_Date'] . "</a></td>";
								echo "<td>" . $row['Title'] . "</td>";
								if ($row['Status'] == "Accepted"){
									echo "<td style='color:green;'>" . $row['Status'] . "</td>";
								}
								elseif($row['Status'] == "Pending"){
									echo "<td style='color:Orange;'>" . $row['Status'] . "</td>";
								}
								elseif($row['Status'] == "Declined"){
									echo "<td style='color:red;'>" . $row['Status'] . "</td>";
								}	
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
				
				?>
				<?php
				if(isset($_POST['submit'])){
					clearContent();
					$search = $_POST['search'];
					$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
							announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
							FROM announcement INNER JOIN user ON user.ID = announcement.UserID
							WHERE user.Name LIKE '%$search%' OR announcement.Status LIKE '%$search%' OR announcement.ID = '$search' OR announcement.Title LIKE '%$search%'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo '<td><a href="manage_announcementdetails.php?ID='.$row['ID'].'">'.$row['ID'].' </a></td>';
							echo "<td>" . $row['Name']. "</td>";
							//$fileName = "order_customer[$fileCount].html";
							//$fileName = "order_customer$fileCount.html";
							//$destFile = "order_customer.html";
							//$createFile = fopen($fileName, "w+");
							//fwrite($createFile, $destFile);
							echo "<td>" . $row['Submission_Date'] . "</a></td>";
							echo "<td>" . $row['Title'] . "</td>";
							if ($row['Status'] == "Accepted"){
								echo "<td style='color:green;'>" . $row['Status'] . "</td>";
							}
							elseif($row['Status'] == "Pending"){
								echo "<td style='color:Orange;'>" . $row['Status'] . "</td>";
							}
							elseif($row['Status'] == "Declined"){
								echo "<td style='color:red;'>" . $row['Status'] . "</td>";
							}	
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
			<div class="footer-copyright text-left py-3">&copy;Copyright 2020. All Rights Reserved
			</div>
	</footer>

</body>
</html>