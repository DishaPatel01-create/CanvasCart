<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'customer'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container" data-aos="fade-up" >
    <h1 data-aos="fade-down">Customer Dashboard 🛒</h1>

    <p>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "Customer"; ?></p>

    <div style="margin-top:20px;" data-aos="zoom-in">
        <a class="btn" href="../index.php">Browse Products</a>
        <a class="btn" href="../cart.php">View Cart</a>
        <a class="btn" href="../order_history.php">My Orders</a>
        <a class="btn" href="../logout.php">Logout</a>
    </div>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
</body>
</html>