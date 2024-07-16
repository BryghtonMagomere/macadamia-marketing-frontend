<?php

// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

if (isset($_POST['farmer_id'])) {
    $farmer_id = mysqli_real_escape_string($conn, $_POST['farmer_id']);

    // Query to fetch farmer details
    $query = "SELECT name, farm_name, location, phone_number, email FROM farmer WHERE farmer_id = '$farmer_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Extract farmer details
        $name = $row['name'];
        $farm_name = $row['farm_name'];
        $location = $row['location'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];

        // Display farmer information
        echo "<h2>Contact Farmer</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Farm Name: $farm_name</p>";
        echo "<p>Location: $location</p>";
        echo "<p>Phone Number: $phone_number</p>";
        echo "<p>Email: $email</p>";
    } else {
        echo "No farmer found with the specified ID.";
    }
} else {
    echo "Invalid request. No farmer ID provided.";
}

// Close connection
mysqli_close($conn);

?>
