<?php

// include 'config.php';
include ('../Model/connect.php');

// session_start();

// $user_id = $_SESSION['id_nguoidung'];

// if(!isset($user_id)){
//    header('location:login.php');
// } 

// thêm vào giỏ hàng

// if(isset($_POST['add_to_cart'])){

//    $product_name = $_POST['ten_sanpham'];
//    $product_price = $_POST['gia'];
//    $product_image = $_POST['image'];
//    $product_quantity = $_POST['product_quantity'];

//    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    if(mysqli_num_rows($check_cart_numbers) > 0){
//       $message[] = 'already added to cart!';
//    }else{
//       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
//       $message[] = 'product added to cart!';
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="box-container">

            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `sanpham`") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
                    <form action="" method="post" class="box">
                        <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_products['ten_sanpham']; ?></div>
                        <div class="price">$<?php echo $fetch_products['gia']; ?>/-</div>
                        <input type="number" min="1" name="số lượng" value="1" class="qty">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['ten_sanpham']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['gia']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">Không có sản phẩm nào</p>';
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>