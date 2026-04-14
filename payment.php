<?php
session_start();
include("config.php");

if (isset($_POST['pay'])) {

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        $order_id = "ART" . rand(1000, 9999);
        $method = $_POST['method'];
        $user_id = $_SESSION['user_id'];

        foreach ($_SESSION['cart'] as $item) {

            $name = $item['name'];
            $price = $item['price'];

            $sql = "INSERT INTO orders (order_id, product_name, price, user_id, payment_method)
                    VALUES ('$order_id', '$name', '$price', '$user_id', '$method')";

            mysqli_query($conn, $sql);
        }

        unset($_SESSION['cart']);

        echo "<script>alert('Payment Successful! Order Placed'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="container" data-aos="flip-left">

    <h2 data-aos="fade-down">Payment Page 💳</h2>

    <form method="POST" data-aos="fade-up">

        <p>Select Payment Method</p>

        <input type="radio" name="method" value="UPI" required> UPI<br><br>

        <input type="radio" name="method" value="Credit / Debit Card"> Credit / Debit Card<br><br>

        <input type="radio" name="method" value="Cash on Delivery"> Cash on Delivery<br><br>

        <button name="pay">Confirm Payment</button>

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