<?php
$host = 'localhost';  // Database host
$user = 'root';       // Database username
$password = '';       // Database password
$dbname = 'precious_memories'; // Replace with your database name

$con = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

