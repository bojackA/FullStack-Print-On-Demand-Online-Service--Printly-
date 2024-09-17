<?php
// MySQL database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'printly';

// Check if the user ID is provided in the query string
if (isset($_GET['id'])) {
  // Get the user ID from the query string
  $userId = $_GET['id'];

  // Create a MySQL connection
  $conn = new mysqli($host, $username, $password, $database);

  // Check the connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Delete the user from the database
  $sql = 'DELETE FROM kids WHERE uniq = ' . $userId;

  if ($conn->query($sql) === TRUE) {
    echo 'product deleted successfully.';
  } else {
    echo 'Error deleting product: ' . $conn->error;
  }

  // Close the MySQL connection
  $conn->close();
}
?>
