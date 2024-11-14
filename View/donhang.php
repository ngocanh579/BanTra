<?php

include('../Model/');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>your orders</h3>
   <p> <a href="home.php">home</a> / orders </p>
</div>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> Tên người dùng : <span><?php echo $fetch_orders['ten_nguoinhan']; ?></span> </p>
         <p> Số điện thoại : <span><?php echo $fetch_orders['sdt_nguoinhan']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['emai;']; ?></span> </p>
         <p> Địa chỉ nhận hàng : <span><?php echo $fetch_orders['diachi_nguoinhan']; ?></span> </p>
         <p> Địa chỉ cố định : <span><?php echo $fetch_orders['diachi_nhanhang']; ?></span> </p>

         <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> Giá : <span><?php echo $fetch_orders['total_price']; ?></span> </p>
         <p> Số lượng : <span>$<?php echo $fetch_orders['total_sl']; ?>/-</span> </p>
         <p>Ngày đặt đơn</p>
         <p> Trạng thái thanh toán : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">Không có thông tin sản phẩm</p>';
      }
      ?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>