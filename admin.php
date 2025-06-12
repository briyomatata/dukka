<?php

@include 'connection.php';

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_type = $_POST['p_type'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'images/'.$p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, product_type, price , image) VALUES ('$p_name', '$p_type', '$p_price',  '$p_image') ") or die('query failed');

    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Product Added Successfully';
    }else{
        $message[] = 'Could Not Add the Product';
    }
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die('query failed');
    if($delete_query){
        // header('location:admin.php');
         $message[] = 'Product Deleted';
    }else{
        // header('location:admin.php');
         $message[] = 'Product Could Not Be Deleted';
    };
};

if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_type = $_POST['update_p_type'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'images/'.$update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products`SET name = '$update_p_name', product_type ='$update_p_type', price = '$update_p_price', image = '$update_p_image' WHERE id= '$update_p_id' ");

    if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message = 'Product Updated Succesfully';
        header('location:admin.php');
    }else{
        $message = 'Product Not Updated';
        header('location:admin.php');
    }
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <section>
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Add New Product</h3>
            <div class="inputBox">
                <span>Enter Name:</span>
                    <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
                </div>

                <div class="inputBox">
                <span>Enter Category:</span>
                      <select name="p_type" id="">
                    <?php
                    $cat = mysqli_query($conn, "SELECT * FROM categories");
                    while($c = mysqli_fetch_array($cat)){
                    ?>

                    <option value="<?php echo $c['id'] ?>"> <?php $c['name'] ?> </option>

                    <?php
                    }
                    ?>



?>

                   </select>
                </div>

                <div class="inputBox">
                <span>Enter Product Price:</span>
                      <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
                </div>

                 <div class="inputBox">
                <span>Select Image:</span>
                    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                </div>
     
            <input type="submit" value="add the product" name="add_product" class="btn">

        </form>
    </section>


    <section class="display-product-table">
        <table>
            <thead>
                <th>product image</th>
                <th>product name</th>
                <th>product price</th>
                <th>action</th>
</thead>

<tbody>
    <?php

    $select_products = mysqli_query($conn, "SELECT * FROM `products`");
    if(mysqli_num_rows($select_products) > 0){
        while ($row = mysqli_fetch_assoc($select_products)) {  
            ?>
            <tr>
            <td><img src="images/<?php echo $row['image']; ?>" height="100" alt=""> </td>
            <td><?php echo $row['name']; ?></td>
            <td>Ksh<?php echo $row['price']; ?> /=</td>
            <td>
                <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick ="return confirm('Are You Sure You Wnt To Delete This?');"> <i class="fas fa-trash"></i> Delete</a>
                <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Edit</a>

        </td>

            </tr>
        




<?php
};

    }else{
        echo "<span> No Product Added </span>";
    }
?>
</tbody>
</table>
           </section> 
           
           
           <section class="edit-form-container">
<?php
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id= $edit_id");
    if(mysqli_num_rows($edit_query) > 0){
        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
           ?> 

           <form action="" method="post" enctype="multipart/form-data">
            <img src="images/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
            <input type="text" class="box" required name="update_p_type" value="<?php echo $fetch_edit['product_type']; ?>">
            <input type="number" class="box" min="0" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
            <input type="file" class="box"  required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
            <input type="submit" value="update the product" name="update_product" class="btn">
            <input type="reset" id="close-edit" value="cancel" class="option-btn">
        </form>
    
    <?php

        };
    };
     echo "<script> document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
    };
   



?>





?>



</section>



</div>

















<script src="js/script.js"></script>
</body>
</html>