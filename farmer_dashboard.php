<?php

// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if farmer_id is set in the session
if (!isset($_SESSION["id"])) {
    // Redirect to login page if not set
    header("Location: login.php");
    exit();
}

// Retrieve the farmer ID from the session
$farmer_id = $_SESSION["id"];

if (isset($_POST['add_listing'])) {
    // Escape user input to prevent SQL injection
    $variety = mysqli_real_escape_string($conn, $_POST['variety']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);

    // Image handling (optional, replace with your logic)
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $image_temp_loc = $_FILES['image']['tmp_name'];

        // Ensure the destination directory exists and has proper permissions
        $upload_dir = "uploads/"; // Replace with your upload directory
        $image = $upload_dir . basename($image_name);
        if (move_uploaded_file($image_temp_loc, $image)) {
            $image = $conn->real_escape_string($image);
        } else {
            echo "Error uploading image.";
            $image = null;
        }
    }

    // Build the query to insert data into the "macadamialisting" table
    $sql = "INSERT INTO macadamialisting (farmer_id, variety, quantity, price, quality, image) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isidss", $farmer_id, $variety, $quantity, $price, $quality, $image);

    if ($stmt->execute()) {
        echo "Listing added successfully!";
        // Optional: Redirect to another page after successful insertion
        // header("Location: communication2.php");
        // exit();
    } else {
        echo "Error adding listing: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
mysqli_close($conn);

?>
