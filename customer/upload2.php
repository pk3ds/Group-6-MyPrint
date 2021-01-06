<?php
// Initialize the session
//require_once 
include '../include/connection-config.inc.php';
session_start();
 
//Check if the user is logged in, if not then redirect him to login page and if yes then redirect back to welcome page depend on his role.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: ../../account/login.php");
	exit;
} else {
	if ($_SESSION["role"] == "admin") {
		header("location: ../../admin/");
	  }
	if ($_SESSION["role"] == "client") {
		header("location: ../../client/");
	  }
	 exit;
}

$username = $_SESSION["username"];
			//Upload File to a Directory in server.
$target_dir = "../file_store/customer_design/";//directory
$target_file = $target_dir .//$username. 
basename($_FILES["filename"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//get the file type of uploaded file
// Check file size
if ($_FILES["filename"]["size"] > 500000) {
	echo 'Sorry, your file is too large.';
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf"
&& $imageFileType != "gif" ) {
	echo "Sorry try using a pdf file which is no too large.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}
$ID = $_GET['ID'];
$jobName;
$price = 0;

$quantity;
$details = '';
$counter = 0;
foreach ($_POST as $key => $value) {
		if($counter==0)
			$jobName = 'Jobname: '.$value;
		if($counter==1)
			$quantity = $value;
		else
			$details= $details."<br>".$value;
		$counter++;
    }
	switch($ID){
	case '1':
		$price = 0.50 * $quantity;
	break;
	case '2':
		$price = 30.00 * $quantity;
	break;
	case '3':
		$price = 1.10 * $quantity;
	break;
	case '4':
		$price = 10.00 * $quantity;
	break;
	case '5':
		$price = 0.50 * $quantity;
	break;
	case '6':
		$price = 5.00 * $quantity;
	break;
	
}
	
	$orderid=2;//Not sure orderID
	$sql = "SELECT MAX(ID) FROM `order`";    
	$stmt = $pdo->query($sql);
	$orderid = $stmt->fetchColumn();
	
	$sql = "SELECT * FROM `order` WHERE Payment_Status LIKE 'unpaid'";
	$stmt = $pdo->query($sql);
	$unpaid = $stmt->fetchColumn();
	try{
		if($unpaid!='paid')
		{
			$sql = "INSERT INTO `product_in_order`(`OrderID`, `ProductID`, `File`, `Name`, `Price`, `Detail`, `Quantity`) VALUES (:orderid,:productid,:file,:name,:price,:detail,:quantity);";    
			$stmt = $pdo->prepare($sql);
			 $stmt->bindParam(':orderid', $orderid);
			 $stmt->bindParam(':productid', $ID);
			 $stmt->bindParam(':file',  $_FILES["filename"]["name"]);
			 $stmt->bindParam(':name', $_POST['job_name']);
			 $stmt->bindParam(':price', $price);
			 $stmt->bindParam(':detail', $details);
			 $stmt->bindParam(':quantity', $quantity);
			$stmt->execute();
		}
		echo '<button><a href="../upload.php?ID='.$ID.'">Go back</a></button>';
	} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	}
?>