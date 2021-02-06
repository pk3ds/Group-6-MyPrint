
<?php

require_once "../include/connection-config.inc.php";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['deletequote'])){

$quoteid = $_POST['quoteid'];
// sql to delete a record
$sql = "DELETE FROM Quote WHERE ID = '$quoteid'"; 

if (mysqli_query($conn, $sql)) {
	include('manage_quote.php');
} else {
	echo "$id";
    echo "Error deleting record";
}
}

?>

