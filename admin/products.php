<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("admin_navbar.php"); ?>

<div class="container" data-aos="fade-up">

    <h2 data-aos="fade-down">All Products</h2>

    <div class="order-card" data-aos="zoom-in">

        <table border="1" width="100%" cellpadding="10">

            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Category</th>
            </tr>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM products");

            while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo $row['category']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init({
    duration: 900,
    once: true
});
</script>

</body>
</html>