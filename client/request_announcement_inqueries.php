<?php 
	require_once "../include/connection-config.inc.php";	
	// Initialize the session
	session_start();
	$userID = $_SESSION["username"];

?>
<?php 
if(isset($_POST["title"])){
	$title = $_POST["title"];
	$status = "Pending";
}
if(isset($_POST["message"])){
	$message = $_POST["message"];
}
if(isset($_POST["enddate"])){
	$enddate = $_POST["enddate"];
}
if(empty($title)){
	$titleError = "Required Title!";
}
if(isset($_POST["submit"]) && !empty($title)){
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}else{
		 $name=$_FILES['file']['name'];
		 $temp=$_FILES['file']['tmp_name'];
		 move_uploaded_file($temp,"/".$name);
		
		//$SELECT = "SELECT
		$INSERT = "INSERT Into announcement(UserID, Title, Message, Submission_Date, End_Date, File, Status) values(?,?,?, CURRENT_TIMESTAMP,?,?,?)";
		//Prepare statement
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssssss",$userID, $title, $message, $enddate, $name, $status);
		$stmt->execute();
		
		

		$stmt->close();
		$conn->close();
	}
}
	include('request_announcement.php');
?>