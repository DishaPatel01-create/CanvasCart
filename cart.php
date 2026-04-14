<?php
session_start();
if(isset($_GET['remove'])){
    $index = $_GET['remove'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
include("config.php");   // ✅ connect database

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_POST['add_to_cart'])){
    $product = [
        "id" => $_POST['product_id'],
        "name" => $_POST['name'],
        "price" => $_POST['price']
    ];

    $_SESSION['cart'][] = $product;
}

# ✅ CHECKOUT LOGIC
if(isset($_POST['checkout'])){
    header("Location: payment.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include("navbar.php"); ?>

<div class="container" data-aos="fade-right">
<h2>Your Cart 🛒</h2>

<?php
$total = 0;

if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $index => $item){
        echo "<p>
<b>{$item['name']}</b> - ₹{$item['price']} 
<a href='cart.php?remove=$index'>❌ Remove</a>
</p>";
        $total += $item['price'];
    }

    echo "<hr>";
    echo "<h3>Total: ₹$total</h3>";
?>

<form method="POST">
    <button name="checkout">Checkout</button>
</form>

<?php
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

<p><a href="index.php" class="btn">← Continue Shopping</a></p>

</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>

<script>
function toggleMenu() {
    document.getElementById("navLinks").classList.toggle("active");
}
</script>
</body>
</html>