<?php
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_errno) {
	die("Connection failed: " . $conn->connect_errno);
}
?>