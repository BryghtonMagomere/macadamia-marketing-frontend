<?php
// buyerregistration.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullName = $_POST["name"];
    $companyName = $_POST["company_name"];
    $location = $_POST["location"];
    $phoneNumber = $_POST["phone_number"];
    $email = $_POST["email"];

    // Validate input (you can add more validation rules)
    if (empty($username) || empty($password) || empty($location) || empty($phoneNumber) || empty($email)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Connect to your database (adjust credentials as needed)
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "macadamia_marketing";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the "buyer" table
    $sql = "INSERT INTO buyer (username, password, company_name, location, phone_number, email)
            VALUES ('$username', '$password', '$companyName', '$location', '$phoneNumber', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
