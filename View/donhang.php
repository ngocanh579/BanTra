<?php

include('../Model/connect.php');

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Your Orders</h3>
   <p> <a href="home.php">Home</a> / Orders </p>
</div>

<section class="placed-orders">

   <h1 class="title">Placed Orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE id_sanpham = '$user_id'");
         if (mysqli_num_rows($order_query) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
      ?>
      <div class="box">
         <p> Tên người dùng : <span><?php echo $fetch_orders['ten_nguoinhan']; ?></span> </p>
         <p> Số điện thoại : <span><?php echo $fetch_orders['sdt_nguoinhan']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Địa chỉ nhận hàng : <span><?php echo $fetch_orders['diachi_nguoinhan']; ?></span> </p>
         <p> Địa chỉ cố định : <span><?php echo $fetch_orders['diachi_nhanhang']; ?></span> </p>

         <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> Giá : <span><?php echo $fetch_orders['total_price']; ?> VND</span> </p>
         <p> Số lượng : <span><?php echo $fetch_orders['total_sl']; ?></span> </p>
         <p> Ngày đặt đơn : <span><?php echo $fetch_orders['order_date']; ?></span> </p>
         <p> Trạng thái thanh toán : <span style="color:<?php echo $fetch_orders['payment_status'] == 'pending' ? 'red' : 'green'; ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
      </div>
      <?php
            }
         } else {
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
