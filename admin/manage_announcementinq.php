<?php
	require_once "../include/connection-config.inc.php"; 
	$Status = $_GET['Status'];
	$ID = $_GET['ID'];
	if($Status=='Accepted'){
		$sql = "UPDATE announcement SET Status='$Status' WHERE ID= '$ID'";
		$result = mysqli_query($conn, $sql);
		include('manage_announcementdetails.php');
	}
	else if($Status=='Declined'){
		$sql = "UPDATE announcement SET Status='$Status' WHERE ID= '$ID'";
		$result = mysqli_query($conn, $sql);
		include('manage_announcementdetails.php');
	}
?>