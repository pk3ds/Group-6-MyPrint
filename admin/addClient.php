<?php 
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];


if(empty($name)){
	$nameError = "Please do not leave this empty.";
}elseif(!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameError = "Please enter a valid name.";
}

if(empty($password)){
	$passwordError = "Please do not leave this empty.";
}

if(empty($email)){
	$emailError = "Please do not leave this empty.";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format entered.";
    }

if(empty($nameError) && empty($passwordError) && empty($emailError)){

	require_once "../include/connection-config.inc.php";
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}else{
		$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
		$sql = "INSERT INTO user (ID, Password, Role, Date_Join, Name, Email, Image)
			VALUES ('$name', '$param_password', 'client', 'CURRENT_TIMESTAMP', '$name', '$email', 'user.png')";

		if ($conn->query($sql) === TRUE) {
		} else {		
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
	}
}
	include('manage_client.php');
?>