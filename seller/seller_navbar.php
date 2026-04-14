<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navbar">

<div class="logo">🏪 Seller Panel</div>

<div class="nav-links">

<a href="dashboard.php">Dashboard</a>

<a href="add_product.php">Add Product</a>

<a href="../index.php">View Store</a>

<a href="../logout.php">Logout</a>

</div>

</div>