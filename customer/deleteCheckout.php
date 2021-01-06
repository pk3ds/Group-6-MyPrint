<?php 

	require_once "../include/connection-config.inc.php";
	if(isset($_GET['delete'])) {
		$delete=$_GET['delete'];
	}
	try {
		$sql = "DELETE FROM product_in_order WHERE id = ?";
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo ->prepare($sql);
		if ($stmt -> execute([$delete])) {
			echo "delete Success";
		} else {
			echo "Something went wrong. Please try again later.";
		}

	} catch (\Throwable $th) {
		echo $th->getMessage();
	}

	include './checkout.php';
?>