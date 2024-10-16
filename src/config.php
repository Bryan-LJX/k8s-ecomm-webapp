<?php
// Database configuration
define('DB_HOST', 'mysql-service');  // This points to the Kubernetes MySQL service
define('DB_USER', 'user1');           // MySQL username
define('DB_PASS', '******');       // MySQL password
define('DB_NAME', 'ecommerce');      // Database name

// Attempt to connect to the MySQL database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
