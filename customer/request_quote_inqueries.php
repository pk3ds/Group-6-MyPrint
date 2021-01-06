<?php 
require_once "../include/connection-config.inc.php";
session_start();
$userID = $_SESSION["username"];
?>

<?php  
if(isset($_POST["title"])){
	$title = $_POST["title"];
}
if(isset($_POST["product_type"])){
	$product_type = $_POST["product_type"];
}
if(isset($_POST["product_name"])){
	$product_name = $_POST["product_name"];
}
if(isset($_POST['quantity'])){
	$quantity = $_POST['quantity'];
}
if(isset($_POST["shipping"])){
	$shipping = $_POST["shipping"];
}
if(isset($_POST["size"])){
	$size = $_POST["size"];
}
if(isset($_POST["paper_type"])){
	$paper_type = $_POST["paper_type"];
}
if(isset($_POST["side_pages"])){
	$side_pages = $_POST["side_pages"];
}
if(isset($_POST["coating"])){
	$coating = $_POST["coating"];
}
if(isset($_POST["color"])){
	$color = $_POST["color"];
}
if(isset($_POST["lamination"])){
	$lamination = $_POST["lamination"];
}
if(isset($_POST["add_details"])){
	$add_details = $_POST["add_details"];
}



if(empty($title)){
	$titleError = "Required Title!";
}
if(empty($product_name)){
	$product_nameError = "Required Product Name!";
}
if(empty($quantity)){
	$quantityError = "Required Quantity!";
}
if(empty($size)){
	$sizeError = "Required Size!";
}
if(empty($paper_type)){
	$paper_typeError = "Required Paper Type!";
}
if(empty($side_pages)){
	$side_pagesError = "Required Side Pages!";
}


if(isset($_POST["submit"]) && !empty($title) && 
!empty($product_name) && !empty($quantity) && !empty($size) && !empty($paper_type) && !empty($side_pages)){
	
	
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}else{
		 $name=$_FILES['file']['name'];
		 $temp=$_FILES['file']['tmp_name'];
		 move_uploaded_file($temp,"../file_store/customer_design/".$name);
		 
		//$SELECT = "SELECT
		$INSERT = "INSERT Into quote(CustomerUserID, Date, Title, Product_Type, Product_Name, Quantity, Shipping, Size, Paper_Type, Side_Pages, Coating, 
		Color, Lamination, Add_Details, File) 
		values(?,CURRENT_TIMESTAMP,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		
		//Prepare statement
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssssisssssssss", $userID, $title, $product_type, $product_name,
		$quantity, $shipping, $size, $paper_type ,$side_pages, $coating, $color, $lamination, $add_details, $name);
		$stmt->execute();
		
		$stmt->close();
		$conn->close();
	}
}
	include('request_quote.php');
?>