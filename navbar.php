<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navbar">

    <div class="logo">🎨 CanvasCart</div>

    <!-- TOGGLE BUTTON -->
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <!-- SEARCH -->
    <form action="index.php" method="GET" class="nav-search">
        <input type="text" name="search"
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
        placeholder="Search art supplies...">
        <button type="submit">Search</button>
    </form>

    <!-- NAV LINKS -->
    <div class="nav-links" id="navLinks">

        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>

        <?php if(isset($_SESSION['user_id'])) { ?>

            <span class="profile-name">
                👤 <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "User"; ?>
            </span>

            <a href="order_history.php">Orders</a>
            <a href="logout.php">Logout</a>

        <?php } else { ?>

            <a href="login.php">Login</a>
            <a href="register.php">Register</a>

        <?php } ?>

    </div>

</div>

