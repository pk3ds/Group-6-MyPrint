<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$numPhone = $_POST['numPhone'];
$company = $_POST['company'];
$message = $_POST['message'];

if(empty($name)){
	$nameError = "Please do not leave this empty.";
}elseif(!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameError = "Please enter a valid name.";
}

if(empty($email)){
	$emailError = "Please do not leave this empty.";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format entered.";
    }

if(empty($numPhone)){
	$numPhoneError = "Please do not leave this empty.";
}elseif(strlen($numPhone) > 10 || strlen($numPhone) < 10){
	$numPhoneError = "Please enter a valid number.";
}

if(empty($company)){
	$companyError = "Please do not leave this empty.";
}

if(empty($message)){
	$messageError = "Please do not leave this empty.";
}


if(empty($nameError) && empty($emailError) && empty($numPhoneError) && empty($companyError) && empty($messageError)){
	$responseMessage = "Response submitted! Our team will contact you immediately.";
	echo "<script type='text/javascript'>alert('$responseMessage');</script>";
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "digital_print";
	
	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}else{
		//$SELECT = "SELECT
		$INSERT = "INSERT Into inquiry(UserID, Name, Email, Phone, Company, Message) values('guest',?,?,?,?,?);";
		
		//Prepare statement
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("sssss", $name, $email, $numPhone, $company, $message);
		$stmt->execute();
		
		
		$stmt->close();
		$conn->close();
	}
}
	include('contact_us.php');

?>