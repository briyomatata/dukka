<header class="header">

<div class="flex">
    <a href="index.php" class="logo">Prime Cuts</a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="shop.php">Shop</a>
        <a href="supplies.php">For Suppliers</a>
        <a href="admin.php">Contact</a>
    </nav>
 
    <?php
    $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);



?>

    <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> <span><?php echo $row_count; ?></span></a>

    <div id="menu-btn" class="fas fa-bars"></div>



</div>

</header>