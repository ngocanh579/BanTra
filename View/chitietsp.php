<!-- Kiểm tra tham số `xem` -->
<?php
if (isset($_GET['xem'])) {
    echo "<script>alert('Tồn tại tham số xem');</script>";
} else {
    echo "<script>alert('Không tồn tại tham số xem');</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Tea Shop</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .main {
            padding: 20px;
        }
        .box-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .box {
            background-color: #fff;
            width: 250px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease;
        }
        .box:hover {
            transform: scale(1.05);
        }
        .box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .name, .price {
            font-size: 1.1em;
            color: #333;
        }
        .price {
            color: #388e3c;
            margin-bottom: 10px;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .btn-group .btn {
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-group .btn:hover {
            background-color: #c8e6c9;
        }
        .btn-group i {
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="box-container">
            <?php
            include('../Model/control_sp.php');
            $get_data = new data_sp();

            if (isset($_GET['xem'])) {
                $fetch_products = $get_data->select_product_id($_GET['xem']);
                if ($fetch_products) {
            ?>
                <div class="box" >
                    <img class="image" src="../image/image_sp/<?php echo $fetch_products['image']; ?>" alt="" width="200px" height="200px">
                    <div class="name"><?php echo $fetch_products['ten_sanpham']; ?></div>
                    <div class="price"><?php echo $fetch_products['gia']; ?> VND</div>
                    <div class="chitiet"><?php echo $fetch_products['thongtinchitiet_sanpham']; ?></div>
                    <div class="btn-group">
                        <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i></button>
                        <button type="button" class="btn"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            <?php
                } else {
                    echo "<p>Không tìm thấy sản phẩm.</p>";
                }
            } else {
                echo "<p>Không nhận được ID sản phẩm.</p>";
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>