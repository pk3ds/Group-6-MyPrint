<?php
$ID = $_GET['ID'];
require_once "../include/connection-config.inc.php"; 
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
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="icon" href="../img/logo.jpg" type="image/icon">
	<!--End-->
</head>
<body>
		<?php include('include/header.html');?>
        <!--Content-->
		<!--Bootstrap: container-fluid = width is set to 100%, p-5 = padding is set to 5-->
        <div class="container-fluid p-5">
            <div class="collumn">
			<!-- Bootstrap: col-xs-1 = collumn width size is set to 1 when screen is extra-small -->
			<div class="col-xs-1">
				<h2>Manage Announcement</h2>
				<h5>ID :<?php echo $_GET['ID']?></h5>
				<!-- Bootstrap: d-block = display block element-->
				<hr class="d-block">
				<form class="shadow-sm p-2">
					<div class="form-group row">
						<label id="announcement_title" class="col-sm-5 col-form-label">Author Name:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID 
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo $row['Name'];
								}
							}
							?>
						</div>
					
						<label id="announcement_title" class="col-sm-5 col-form-label">Announcement Title:</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID 
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo $row['Title'];
								}
							}
							?>
						</div>
						
						<label id="message" class="col-sm-5 col-form-label">Message :</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">	
							<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID 
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo $row['Message'];
								}
							}
							?>
						</div>
						<label id="duration" class="col-sm-5 col-form-label">Submission Date: </label>
											  <!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">
						  	<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo $row['Submission_Date'];
								}
							}
							?>
						</div>
						
						<label id="duration" class="col-sm-5 col-form-label">End Date: </label>
											  <!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">
						  	<?php   

							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID 
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo $row['End_Date'];
								}
							}
							?>
						</div>				
						<label id="file" class="col-lg-5 col-form-label float-right">File Upload :</label>
						<!-- Bootstrap: collumn width is set to 6 when screen size is smaller than 576px, p-2 = padding is set to 2 -->
						<div class="col-sm-6 p-2">
							<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									//echo '<a src=" '$row['File']' ';
									echo $row['File'];
								}
							}
							?>
						</div>
						<label id="status" class="col-sm-5 col-form-label">Status: </label>
						<div class="col-sm-6 p-2">
						  	<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID 
									WHERE announcement.ID = '$ID'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									if ($row['Status'] == "Accepted"){
										echo "<div class='text-success' >" . $row['Status'] . "</div>";
									}
									elseif($row['Status'] == "Pending"){
										echo "<div class='text-warning' >" . $row['Status'] . "</div>";
									}
									elseif($row['Status'] == "Declined"){
										echo "<div class='text-danger'   >". $row['Status'] . "</div>";
									}
								}
							}
							?>
						</div>			
						<!--Bootstrap: container-fluid = width is set to 100%-->
						<div class="container-fluid">
							<?php   
							$ID = $_GET['ID'];
							$sql = "SELECT user.Name, announcement.ID, announcement.Title, announcement.Message, 
									announcement.Submission_Date, announcement.End_Date, announcement.File, announcement.Status
									FROM announcement INNER JOIN user ON user.ID = announcement.UserID
									WHERE announcement.ID = '$ID'";
									
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									if ($row['Status'] == "Accepted"){
										echo '';
									}
									elseif($row['Status'] == "Pending"){
										echo '<button type="submit" class="btn btn-danger float-right btn-sm ml-2" >
										<a style="color:white;" href="manage_announcementinq.php?Status=Declined&ID='.$row['ID'].'">'.'Decline'.' </a> </button>';
					
										echo '<button type="submit" class="btn btn-success float-right btn-sm " >
										<a style="color:white;" href="manage_announcementinq.php?Status=Accepted&ID='.$row['ID'].'">'.'Accept'.' </a> </button>';
										
									}
									elseif($row['Status'] == "Declined"){
										echo '';
									
									}
								}
							}
							?>
							<a href="manage_announcement.php" class="btn btn-info btn-sm float-left" role="button">Back</a>
						</div>
					</div>
				</form>
				<!-- Bootstrap: d-block = display block element-->
				<br><hr class="d-block"><br>
                </div>
            </div>
        </div>
    
		<!--Footer-->
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
</body>
</html>
