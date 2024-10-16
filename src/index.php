<?php
require_once 'config.php';
require_once 'db.php';
require_once 'cart.php';

// Fetch all products from the database
$sql = "SELECT * FROM products";
$products = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Knights</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Marvel Knights</h1>

    <h2>Products</h2>
    <div class="products">
        <?php while ($product = $products->fetch_assoc()): ?>
            <div class="product">
                <h3><?= $product['name']; ?></h3>
                <p><?= $product['description']; ?></p>
                <p><strong>$<?= $product['price']; ?></strong></p>
                <a href="index.php?add_to_cart=<?= $product['id']; ?>">Add to Cart</a>
            </div>
        <?php endwhile; ?>
    </div>

    <h2>Your Cart</h2>
    <div class="cart">
        <?php
        $cartItems = getCartItems($conn);
        if ($cartItems->num_rows > 0): ?>
            <ul>
                <?php while ($item = $cartItems->fetch_assoc()): ?>
                    <li><?= $item['name']; ?> - $<?= $item['price']; ?>
                        <a href="index.php?remove=<?= $item['id']; ?>">Remove</a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
