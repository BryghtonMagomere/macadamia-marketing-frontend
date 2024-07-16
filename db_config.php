<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Your database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "macadamia_marketing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
