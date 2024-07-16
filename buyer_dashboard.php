<?php

// Include database connection file (replace 'db_config.php' with your actual file)
require_once 'db_config.php';

$search_query = "SELECT * FROM macadamialisting"; // Base query to select listings

$where_clauses = []; // Array to store WHERE clause conditions

// Build WHERE clause conditions based on user input
if (isset($_POST['variety']) && $_POST['variety'] !== "") {
  $variety = mysqli_real_escape_string($conn, $_POST['variety']);
  $where_clauses[] = "variety = '$variety'";
}

if (isset($_POST['location']) && $_POST['location'] !== "") {
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $where_clauses[] = "location LIKE '%$location%'"; // Use LIKE for partial location matching
}

if (isset($_POST['min_price']) && $_POST['min_price'] !== "") {
  $min_price = mysqli_real_escape_string($conn, $_POST['min_price']);
  $where_clauses[] = "price >= $min_price";
}

if (isset($_POST['max_price']) && $_POST['max_price'] !== "") {
  $max_price = mysqli_real_escape_string($conn, $_POST['max_price']);
  $where_clauses[] = "price <= $max_price";
}

if (isset($_POST['quantity']) && $_POST['quantity'] !== "") {
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $where_clauses[] = "quantity >= $quantity";
}

// Build the complete WHERE clause if there are any conditions
if (!empty($where_clauses)) {
  $where_clause = " WHERE " . implode(" AND ", $where_clauses);
  $search_query .= $where_clause;
}

// Add ORDER BY clause based on user selection
if (isset($_POST['sort_by'])) {
  $sort_by = mysqli_real_escape_string($conn, $_POST['sort_by']);
  
  // Validate the sort_by value to prevent SQL injection and ensure it matches allowed columns
  $valid_sort_columns = ['price', 'quantity', 'variety', 'quality']; // Add other column names as needed
  $sort_direction = "ASC"; // Default sort direction

  if (in_array($sort_by, $valid_sort_columns)) {
    if (isset($_POST['sort_direction']) && in_array($_POST['sort_direction'], ['ASC', 'DESC'])) {
      $sort_direction = mysqli_real_escape_string($conn, $_POST['sort_direction']);
    }
    $search_query .= " ORDER BY $sort_by $sort_direction";
  }
}

// Execute the search query
$result = mysqli_query($conn, $search_query);

if (mysqli_num_rows($result) > 0) {
  echo "<h2>Search Results</h2>";
  // Display search results here (loop through the result set)
  while ($row = mysqli_fetch_assoc($result)) {
    // Extract listing details from each row ($row)
    $farmer_id = $row['farmer_id'];
    $variety = $row['variety'];
    $quantity = $row['quantity'];
    $price = $row['price'];
    $quality = $row['quality'];
    $description = $row['description'];
    $image = $row['image']; // Assuming image path is stored in a column

    // Display listing information (example)
    echo "<div class='listing-item'>
              <h3>$variety ($quality)</h3>
              <p>Farmer ID: $farmer_id</p>
              <p>Quantity: $quantity Kg</p>
              <p>Price: $$price per Kg</p>
              <p>Description: $description</p>
              <img src='$image' alt='$variety Macadamia' />
              <form action='communication.php' method='post'>
                <input type='hidden' name='farmer_id' value='$farmer_id'>
                <button type='submit'>Contact Farmer</button>
              </form>
          </div>";
  }
} else {
  echo "No listings found matching your search criteria.";
}

// Close connection
mysqli_close($conn);

?>
