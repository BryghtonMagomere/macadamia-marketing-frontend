<?php

// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

// Check if form is submitted
if (isset($_POST['farmer_id']) && isset($_POST['message'])) {

  // Escape user input to prevent SQL injection
  $farmer_id = mysqli_real_escape_string($conn, $_POST['farmer_id']);
  $buyer_id = getLoggedInUserId(); // Replace with your logic to get buyer ID
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $timestamp = date("Y-m-d H:i:s"); // Current timestamp

  // Build the query to insert message
  $sql = "INSERT INTO communication (sender_id, receiver_id, message_content, timestamp) 
          VALUES ($buyer_id, $farmer_id, '$message', '$timestamp')";

  if (mysqli_query($conn, $sql)) {
    echo "Message sent successfully!";
  } else {
    echo "Error sending message: " . mysqli_error($conn);
  }

} else {
  echo "Error: Invalid request.";
}

// Close connection
mysqli_close($conn);

?>
