<?php

define ('DBCONNECTION', 'mysql: host=localhost; dbname=digital_print; ');
define('DBUSER', 'root');
define('DBPASS', '');

$servername = "localhost";
$serverusername = "root";
$serverpassword = "";
$dbname = "digital_print";

function setConnection($values=array()) {
    $connString = $values[0];
    $user = $values[1];
    $password = $values[2];
    $pdo = new PDO($connString, $user, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }

  $pdo = setConnection(array(DBCONNECTION, DBUSER, DBPASS));

  $conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

?>
