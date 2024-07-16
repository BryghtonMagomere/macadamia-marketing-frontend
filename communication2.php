<?php

// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the user ID from the session
$user_id = $_SESSION['id'];

// Retrieve the farmer ID from the session
$farmer_id = $_SESSION['farmer_id'];

// Retrieve messages sent to the farmer
if (isset($conn)) {
    $sql = "SELECT * FROM communication WHERE receiver_id = $farmer_id";
    $result = mysqli_query($conn, $sql);

    // Display messages
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Messages</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            $sender_id = $row['sender_id'];
            $message_content = $row['message_content'];
            $timestamp = $row['timestamp'];

            // Retrieve sender's username
            $sender_query = "SELECT username FROM users WHERE id = $sender_id";
            $sender_result = mysqli_query($conn, $sender_query);
            $sender_row = mysqli_fetch_assoc($sender_result);
            $sender_username = $sender_row['username'];

            echo "<div class='message'>
                      <p><strong>From:</strong> $sender_username</p>
                      <p><strong>Message:</strong> $message_content</p>
                      <p><strong>Sent:</strong> $timestamp</p>
                  </div>";
        }
    } else {
        echo "<p>No messages found.</p>";
    }
} else {
    echo "Database connection is not established.";
}

// Form to send feedback message to buyers
echo "<h2>Send Feedback</h2>";
echo "<form action='send_feedback.php' method='post'>
          <input type='hidden' name='receiver_id' value='$user_id'>
          <textarea name='message' rows='5' placeholder='Enter your feedback message'></textarea><br>
          <button type='submit'>Send Feedback</button>
      </form>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communication Page</title>
</head>
<body>
    <!-- Your HTML content for communication page goes here -->
</body>
</html>
