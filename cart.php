<?php

include('connection.php');

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id ='$update_id'");
    if($update_quantity_query){
        header('location:cart.php');
    };
};

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = $remove_id");
    header('location:cart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/cart.css">
    <link rel="stylesheet" href="Css/header.css">
    <link rel="stylesheet" href="Css/order.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>


<?php  
include 'header.php';
?>



<div class="container">
    <section class="shopping-cart">
        <h1 class="heading">Shopping Cart</h1>

        <div class="cart-items-container">
            <?php
            // Assuming $conn is already defined and connected to your database
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0;

            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            ?>
                    <div class="cart-item-card">
                        <div class="item-image">
                            <img src="images/<?php echo $fetch_cart['image']; ?>" alt="<?php echo $fetch_cart['name']; ?>">
                        </div>
                        <div class="item-details">
                            <div class="item-name"><?php echo $fetch_cart['name']; ?></div>
                            <div class="item-price">Ksh<?php echo number_format($fetch_cart['price']); ?></div>
                            <div class="item-quantity">
                                <form action="" method="post">
                                    <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <span>Quantity:</span>
                                    <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" value="update" name="update_update_btn" class="update-btn">
                                </form>
                            </div>
                            <div class="item-subtotal">
                                Subtotal: Ksh<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?> /=
                            </div>
                            <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn">
                                <i class="fas fa-trash"></i> remove
                            </a>
                        </div>
                    </div>
            <?php
                    $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']); // Calculate grand total before formatting
                };
            } else {
                echo '<p class="empty-cart-message">Your cart is empty.</p>';
            }
            ?>
        </div>

        <div class="cart-summary">
            <div class="grand-total">
                <span>Grand Total:</span>
                <span class="total-amount">Ksh <?php echo number_format($grand_total); ?> /=</span>
            </div>
            <div class="cart-actions">
                <a href="shop.php" class="option-btn continue-shopping">Continue Shopping</a>
                <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all items from your cart?');" class="delete-btn clear-cart-btn" <?= ($grand_total > 0)? '': 'disabled'; ?>">
                    <i class="fas fa-trash"></i> Clear Cart
                </a>
            </div>
        </div>

        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1)? '': 'disabled'; ?>">Proceed to Checkout</a>
        </div>

    </section>
</div>
  

  <script src="js/script.js"></script>
</body>
</html>