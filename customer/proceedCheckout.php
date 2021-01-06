<?php 

	require_once "../include/connection-config.inc.php";
	session_start();
	if(isset($_GET['orderID'])) {
		$orderID=$_GET['orderID'];
	}
	try {
		$sql = "UPDATE digital_print.order set payment_status='paid' WHERE id = ?";
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare($sql);
		if ($stmt -> execute([$orderID])) {
			echo "update Success";
		} else {
			echo "Something went wrong. Please try again later.";
		}
		$sql = "INSERT INTO digital_print.order(CustomerUserID, Date, Payment_Status, Status) VALUES (?,CURRENT_TIMESTAMP, 'Unpaid', 'Pending')";
		$stmt = $pdo ->prepare($sql);
		$username = $_SESSION['username'];
		$stmt -> bindValue(1, $username);
		if ($stmt -> execute()) {
			echo "insert Success";
		} else {
			echo "Something went wrong. Please try again later.";
		}
	} catch (\Throwable $th) {
		echo $th->getMessage();
	}
	
	header("location: ../customer/");
?>