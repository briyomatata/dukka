<?php

include('connection.php');

if(isset($_POST['order_btn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $address = $_POST['area'];
    $county = $_POST['county'];
    $town = $_POST['town'];
    $date = $_POST['DeliveryDate'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['name'] .' (' . $product_item['quantity'] .' )';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;

        };
    };

    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, method, address,county, town, delivery_date, total_products, total_price ) VALUES ('$name', '$number', '$email', '$method', '$address', '$county', '$town','$date', '$total_product', '$price_total')") or ('query failed');

    if($cart_query && $detail_query){
        echo "
        <div class='order-message-container'>
    <div class='message-container'>
        <h3>thank you for shopping!</h3>
        <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total :Ksh ".$price_total." /=</span>
        </div>
        <div class='customer-details'>
            <p>Your Name : <span> ".$name."</span></p>
            <p>Your Number : <span> ".$number."</span></p>
            <p>Your Email : <span> ".$email."</span></p>
            <p>Your Address : <span>".$address.", ".$county.", ".$town."</span></p>
            <p>Your Delivery Date : <span>".$date."</span></p>
           <p>(*pay when product arrives*)</p>
        </div>
        <a href='shop.php' class='btn'>Continue shopping</a>
    </div>

</div>";
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/header.css">
    <link rel="stylesheet" href="Css/checkout.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    

<?php  
include 'header.php';
?>

<div class="container">
    <section class="checkout-form">

    <h1 class="heading">
        Complete Your Order
    </h1>





        <form action="" method="post">

        
    <div class="display-order">
        <?php
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        $total= 0;
        $grand_total = 0;
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
        $grand_total = $total += $total_price;

        ?>
        <span><?=$fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
        <?php
            }
        }
            else{
                echo "<div class='display-order'><span>Your Cart is Empty!</span></div>";
            }
        

?>
<span class="grand-total"> grand total : Ksh <?= $grand_total; ?>/=</span>
    </div>



            <div class="flex">
                <div class="inputBox">
                    <span>Your Name:</span>
                    <input type="text" placeholder="enter your name" name="name" required>
                </div>

                <div class="inputBox">
                    <span>Your Phone Number:</span>
                    <input type="number" placeholder="enter your number" name="number" required>
                </div>

                <div class="inputBox">
                    <span>Your Email:</span>
                    <input type="email" placeholder="enter your Email" name="email" required>
                </div>

                <div class="inputBox">
                    <span>Payment Method:</span>
                   <select name="method" id="">
                    <option value="cash on delivery" selected>cash on delivery</option>
                    <option value="Mpesa" >Lipa na Mpesa</option>
                   </select>
                </div>

                <div class="inputBox">
                    <span>Your Area:</span>
                    <input type="text" placeholder="e.g. area" name="area" required>
                </div>

                 <div class="inputBox">
                    <span>County:</span>
                    <input type="text" placeholder="e.g. nairobi" name="county" required>
                </div>

                <div class="inputBox">
                    <span>Town:</span>
                    <input type="text" placeholder="e.g. nairobi" name="town" required>
                </div>

                <div class="inputBox">
                    <span>Choose Delivery Date:</span>
                     <input type="date" id="booking-date" name="DeliveryDate">
                </div>
            </div>

            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>

    </section>
</div>






 <script src="js/script.js"></script>
</body>
</html>