<?php
session_start();
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Orders</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="container" data-aos="fade-up">

    <h2>My Orders 📦</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <div class="order-card" data-aos="zoom-in">
            <p><strong>Order ID:</strong> <?php echo $row['id']; ?></p>
            <p><strong>Product:</strong> <?php echo $row['product_name']; ?></p>
            <p><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
        </div>

    <?php
        }

    } else {

        echo "<p>No orders yet.</p>";

    }
    ?>

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