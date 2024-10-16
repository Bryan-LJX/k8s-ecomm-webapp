<?php
require_once 'config.php';

// Create the products table
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
)";
$conn->query($sql);

// Insert sample data if table is empty
$sql = "SELECT COUNT(*) as count FROM products";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("INSERT INTO products (name, price, description) VALUES
        ('Daredevil', 19.99, 'The Man Without Fear'),
        ('Moon Knight', 29.99, 'The Fist of Khonshu'),
        ('Ghost Rider', 39.99, 'The Spirit of Vengeance')
    ");
}
?>
