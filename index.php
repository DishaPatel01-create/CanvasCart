<?php
include("config.php");

$search = "";
$category = "";

if(isset($_GET['search'])){
    $search = trim($_GET['search']);
}

if(isset($_GET['category'])){
    $category = trim($_GET['category']);
}

$query = "SELECT * FROM products WHERE name LIKE '%$search%'";

if($category != "" && $category != "All"){
    $query .= " AND category='$category'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CanvasCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    

<?php include("navbar.php"); ?>

<div class="container" data-aos="fade-up">
    <h1>Art Supplies Marketplace 🎨</h1>

    <form method="GET">
        <select name="category">
            <option value="All">All</option>
            <option value="paints" <?php if($category=="paints") echo "selected"; ?>>Paints</option>
            <option value="brushes" <?php if($category=="brushes") echo "selected"; ?>>Brushes</option>
            <option value="canvas" <?php if($category=="canvas") echo "selected"; ?>>Canvas</option>
            <option value="tools" <?php if($category=="tools") echo "selected"; ?>>Tools</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <div class="products">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <div class="product-card" data-aos="zoom-in">
                <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p>Category: <?php echo $row['category']; ?></p>
                <p>Price: ₹<?php echo $row['price']; ?></p>
                <p>Stock: <?php echo $row['stock']; ?></p>

                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
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
    var menu = document.getElementById("navLinks");
    if(menu){
        menu.classList.toggle("active");
    }
}
</script>

</body>
</html>