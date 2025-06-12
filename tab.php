<?php

include('connection.php');


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

if(isset($_GET['category_name'])){
    $category_name = $_GET['category_name'];
    $sql_product_category = "SELECT * FROM products WHERE product_type = '$category_name'"; 
    $result_product_category = mysqli_query($conn, $sql_product_category);

};



$sql_category = "SELECT * FROM categories";
$result_category = mysqli_query($conn, $sql_category);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="Css/tab.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <ul class="list">
                <?php while($row_category = mysqli_fetch_assoc($result_category)){ ?>
                <li><a href="tab.php?category_name=<?php echo $row_category['name'] ?> "><?php echo $row_category['name'] ?></a></li>
                <?php  }?>
            </ul>
        </div>
    </div>



    <div class="container">
    <section class="products">

      <section class="hero-container">
          <main>


        

        <?php if($result_product_category){
            while($row_product_category = mysqli_fetch_assoc($result_product_category)){?>
                   <div class="box">
                <img src="images/<?php echo $row_product_category['image']; ?>" alt="">
                <h3><?php echo $row_product_category['name']; ?></h3>
                <div class="price">Ksh<?php echo $row_product_category['price']; ?>/=</div>
                <input type="hidden" name="product_name" value="<?php echo $row_product_category['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row_product_category['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row_product_category['image']; ?>">
                <input type="submit" class="btn" value="Shop Products" name="add_to_cart" > 
            </div>
           <?php } ?>
      <?php 
       }

          ?>

    </section>
</div>


</body>
</html>