<?php
session_start();
include("../config.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$users = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$products = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
$orders = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders");

$user_count = mysqli_fetch_assoc($users)['total'];
$product_count = mysqli_fetch_assoc($products)['total'];
$order_count = mysqli_fetch_assoc($orders)['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("admin_navbar.php"); ?>

<div class="container" data-aos="fade-up">

    <h1 data-aos="fade-down">Admin Dashboard 👑</h1>

    <div class="stats">

        <div class="stat-card" data-aos="zoom-in">
            <h2><?php echo $user_count; ?></h2>
            <p>Total Users</p>
        </div>

        <div class="stat-card" data-aos="zoom-in" data-aos-delay="100">
            <h2><?php echo $product_count; ?></h2>
            <p>Total Products</p>
        </div>

        <div class="stat-card" data-aos="zoom-in" data-aos-delay="200">
            <h2><?php echo $order_count; ?></h2>
            <p>Total Orders</p>
        </div>

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