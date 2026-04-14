<?php
include("config.php");

$message = "";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role)
            VALUES ('$name', '$email', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        $message = "Registration Successful!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - CanvasCart</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="form-container" data-aos="fade-up">

    <h2 data-aos="fade-down">Create Account</h2>

    <?php if ($message != "") { ?>
        <p style="text-align:center;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" data-aos="zoom-in">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role" required>
            <option value="customer">Customer</option>
            <option value="seller">Seller</option>
        </select>

        <button type="submit" name="register">Register</button>

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