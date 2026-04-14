<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'seller'){
    header("Location: ../login.php");
    exit();
}

$message = "";

if(isset($_POST['add_product'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = trim($_POST['price']);
    $stock = trim($_POST['stock']);
    $seller_id = $_SESSION['user_id'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    if($image != ""){
        move_uploaded_file($temp, "../uploads/" . $image);
    }

    $sql = "INSERT INTO products (seller_id, name, category, price, stock, image)
            VALUES ('$seller_id', '$name', '$category', '$price', '$stock', '$image')";

    if(mysqli_query($conn, $sql)){
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include("seller_navbar.php"); ?>

<div class="form-container" data-aos="zoom-in">
    <h2 data-aos="fade-down">Add New Product</h2>

    <?php if($message != ""){ ?>
        <p style="text-align:center;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data" data-aos="fade-up">
        <label>Product Name</label>
        <input type="text" name="name" required>

        <label>Category</label>
        <select name="category" required>
            <option value="">Select Category</option>
            <option value="paints">Paints</option>
            <option value="brushes">Brushes</option>
            <option value="canvas">Canvas</option>
            <option value="tools">Tools</option>
        </select>

        <label>Price</label>
        <input type="number" name="price" step="0.01" required>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <label>Product Image</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit" name="add_product">Add Product</button>
    </form>
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