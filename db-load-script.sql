-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS ecommerce;

-- Use the created database
USE ecommerce;

-- Create the new user 'user1' with the specified password
CREATE USER IF NOT EXISTS 'user1'@'%' IDENTIFIED BY 'P@ssword123';

-- Grant all privileges on the ecommerce_db to the new user
GRANT ALL PRIVILEGES ON ecommerce.* TO 'user1'@'%';

-- Apply the changes
FLUSH PRIVILEGES;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the orders table
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create the order_items table
CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert initial data (optional)
-- Inserting a default admin user with hashed password
INSERT INTO users (username, email, password) VALUES
('admin', 'admin@example.com', MD5('password'));

-- Insert sample products
INSERT INTO products (name, description, price) VALUES
('Daredevil', 'The Man Without Fear', 19.99),
('Moon Knight', 'The Fist of Khonshu', 29.99),
('Ghost Rider', 'The Spirit of Vengeance', 39.99);
