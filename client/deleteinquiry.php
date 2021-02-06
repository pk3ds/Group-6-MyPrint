
<?php

require_once "../include/connection-config.inc.php";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['deleteinquiry'])){

$inquiryid = $_POST['inquiryid'];
// sql to delete a record
$sql = "DELETE FROM inquiry WHERE ID = '$inquiryid'"; 

if (mysqli_query($conn, $sql)) {
	include('viewInqueries.php');
} else {
	echo "$id";
    echo "Error deleting record";
}
}

?>

