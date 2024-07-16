<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "macadamia_marketing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]); // Plain text password
  $user_type = "farmer"; // Assuming constant value for farmer registration
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $farm_name = mysqli_real_escape_string($conn, $_POST["farm_name"]);
  $location = mysqli_real_escape_string($conn, $_POST["location"]);
  $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);

  // Prepare the SQL statement
  $sql = "INSERT INTO Farmer (username, PASSWORD, name, farm_name, location, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?)";

  // Prepare the statement
  $stmt = mysqli_prepare($conn, $sql);

  if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
  }

  // Bind parameters to the prepared statement
  mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $name, $farm_name, $location, $phone_number, $email);

  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    echo "<p class='alert alert-success'>Registration successful! Please log in to continue.</p>";
  } else {
    echo "<p class='alert alert-danger'>Error: " . mysqli_stmt_error($stmt) . "</p>";
  }

  // Close the prepared statement
  mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>
