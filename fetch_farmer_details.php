<?php
require_once 'db_config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['farmer_id'])) {
    $farmer_id = $_SESSION['farmer_id'];

    $sql = "SELECT farm_name, location, phone_number, email FROM farmer WHERE farmer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $farmer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $farmer = $result->fetch_assoc();
        echo "<p>Farm Name: " . htmlspecialchars($farmer['farm_name']) . "</p>";
        echo "<p>Location: " . htmlspecialchars($farmer['location']) . "</p>";
        echo "<p>Phone Number: " . htmlspecialchars($farmer['phone_number']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($farmer['email']) . "</p>";
    } else {
        echo "No details found for the selected farmer.";
    }

    $stmt->close();
} else {
    echo "Farmer ID not set in session.";
}

$conn->close();
?>
