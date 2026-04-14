<?php
include("config.php");

if (!isset($_GET['id'])) {
    echo "Product not found.";
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "Product not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="container" data-aos="fade-up">

    <h2 data-aos="fade-down"><?php echo $product['name']; ?></h2>

    <img src="uploads/<?php echo $product['image']; ?>" width="300" data-aos="zoom-in">

    <p><b>Category:</b> <?php echo $product['category']; ?></p>

    <p><b>Price:</b> ₹<?php echo $product['price']; ?></p>

    <p><b>Stock:</b> <?php echo $product['stock']; ?></p>

    <form method="POST" action="cart.php" data-aos="fade-up">

        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">

        <button name="add_to_cart">Add to Cart</button>

    </form>

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