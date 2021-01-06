
<?php
$id = $_GET['id'];
require_once "../include/connection-config.inc.php";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM user WHERE ID = '$id'"; 

if (mysqli_query($conn, $sql)) {
	include('manage_client.php');
} else {
	echo "$id";
    echo "Error deleting record";
}

?>

