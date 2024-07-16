<?php
// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

// Escape user input to prevent SQL injection
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Build the query to check for the user in the "buyer" table
$sql = "SELECT * FROM buyer WHERE username = '$username' AND password = '$password'"; // Modify if password is stored as plain text

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Login successful (replace with your desired actions)
    echo "Login successful! Redirecting...";
    // You can start a session here to store user information
     header("Location:buyer_dashboard.html"); // Example redirect
} else {
    // Login failed (display an error message or redirect to login page)
    echo "Invalid username or password. Please try again.";
    // You can redirect back to the login page here
    //header("Location: .html"); // Example redirect
}

// Close connection
mysqli_close($conn);
?>
