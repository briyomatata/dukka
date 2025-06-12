<?php

@include 'connection.php';

$sql_category = "SELECT * FROM categories";
$result_category = mysqli_query($conn, $sql_category);

if(isset($_GET['category_name'])){
    $category_name = $_GET['category_name'];
    $sql_product_category = "SELECT * FROM products WHERE product_type = '$category_name'"; 
    $result_product_category = mysqli_query($conn, $sql_product_category);
}else{
    $sql_product_category = "SELECT * FROM products";
    $result_product_category  = mysqli_query($conn, $sql_product_category);
};


if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if(mysqli_num_rows($select_cart)> 0){
        $message[] = 'Product Already Added to Cart';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price,image, quantity)
        VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'Product Added to Cart Successfully';
    };
};







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/shop.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/header.css">
    <link rel="stylesheet" href="Css/tab.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shop</title>
</head>
<body>

<?php

if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>' .$message. '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
}

?>
    


    <?php  
include 'header.php';
?>


<div class="container">
    <section class="products">

    <h3 class="heading">
         <h1 class="heading">
          Latest Products  
        </h1>
    </h3>

    <div class="hero-container">

         <?php while($row_product_category = mysqli_fetch_assoc($result_product_category)){
            ?>
            <form action="" method="post">
            <div class="box">
                <img src="images/<?php echo $row_product_category['image']; ?>" alt="">
                <h3><?php echo $row_product_category['name']; ?></h3>
                <div class="price">Ksh<?php echo $row_product_category['price']; ?>/=</div>
                <input type="hidden" name="product_name" value="<?php echo $row_product_category['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row_product_category['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row_product_category['image']; ?>">
                <input type="submit" class="btn" value="buy Now" name="add_to_cart" > 
            </div>
            </form>
        <?php } ?>  

    
         
    </div>
        
       

                
    </section>

    
</div>





<script src="js/script.js"></script>
</body>
</html>

  