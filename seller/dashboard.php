<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

include("../config.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'seller') {
    header("Location: ../login.php");
    exit();
}

$seller_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE seller_id='$seller_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("seller_navbar.php"); ?>

<div class="container" data-aos="fade-up">

    <h2 data-aos="fade-down">Seller Dashboard</h2>

    <a class="btn" href="add_product.php" data-aos="fade-right">➕ Add New Product</a>

    <br><br>

    <div class="products">

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="product-card">

            <img src="../uploads/<?php echo $row['image']; ?>">

            <h3><?php echo $row['name']; ?></h3>

            <p>Category: <?php echo $row['category']; ?></p>

            <p>Price: ₹<?php echo $row['price']; ?></p>

            <p>Stock: <?php echo $row['stock']; ?></p>

            <a class="btn"
               href="delete_product.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Delete this product?')">
               Delete
            </a>

        </div>

        <?php
            }

        } else {

            echo "<p>No products added yet.</p>";

        }
        ?>

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