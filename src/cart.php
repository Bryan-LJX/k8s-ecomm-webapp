<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart
if (isset($_GET['add_to_cart'])) {
    $product_id = intval($_GET['add_to_cart']);
    $_SESSION['cart'][] = $product_id;
    header("Location: index.php");
    exit();
}

// Remove product from the cart
if (isset($_GET['remove'])) {
    $product_id = intval($_GET['remove']);
    $key = array_search($product_id, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
    header("Location: index.php");
    exit();
}

// Display cart contents
function getCartItems($conn) {
    if (!empty($_SESSION['cart'])) {
        $ids = implode(',', array_map('intval', $_SESSION['cart']));
        $sql = "SELECT * FROM products WHERE id IN ($ids)";
        return $conn->query($sql);
    }
    return [];
}
?>
