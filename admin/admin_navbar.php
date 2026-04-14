<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<div class="navbar">

<div class="logo">👑 Admin Panel</div>

<div class="nav-links">

<a href="dashboard.php">Dashboard</a>

<a href="users.php">Users</a>

<a href="products.php">Products</a>

<a href="orders.php">Orders</a>

<a href="../index.php">View Store</a>

<a href="../logout.php">Logout</a>

</div>

</div>