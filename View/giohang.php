<?php
// Kết nối cơ sở dữ liệu
include '../Model/connect.php';
// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// Lấy ID người dùng
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
// if (!$user_id) {
//     die("Bạn cần đăng nhập để xem giỏ hàng.");
// }
// Xử lý xóa sản phẩm
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `giohang` WHERE id_giohang = '$delete_id' AND id_nguoidung = '$user_id'") or die('query failed');
    header('location:giohang.php');
}
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
    header('location:giohang.php');
}
$grand_total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<style>

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 100px auto; /* Tạo khoảng cách cách đều trên và dưới */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* Tùy chọn, làm tròn góc để thiết kế đẹp hơn */
}


        .flex {
            display: flex;
        }
        .justify-between {
            justify-content: space-between;
        }
        .items-center {
            align-items: center;
        }
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        .coupon {
            display: flex;
            align-items: center;
        }
        .coupon label {
            margin-right: 10px;
            font-weight: bold;
        }
        .coupon input {
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .coupon button {
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .coupon button:hover {
            background-color: #218838;
        }
        .summary {
            text-align: right;
        }
        .summary div {
            margin-bottom: 10px;
        }
        .summary .total {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .checkout {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .checkout:hover {
            background-color: #0056b3;
        }
    </style>
<body class="bg-gray-100">
    <?php include 'header.php' ?>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Giỏ hàng</h1>
        <table class="w-full border-collapse bg-white border border-gray-300 mb-6 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left font-bold text-gray-600">TÊN SẢN PHẨM</th>
                    <th class="p-4 text-left font-bold text-gray-600">GIÁ</th>
                    <th class="p-4 text-left font-bold text-gray-600">SỐ LƯỢNG</th>
                    <th class="p-4 text-left font-bold text-gray-600">TỔNG</th>
                    <th class="p-4 text-left font-bold text-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $sub_total = $fetch_cart['soluong'] * $fetch_cart['gia'];
                        $grand_total += $sub_total;
                ?>
                <tr class="border-b border-gray-300">
                    <td class="p-4 flex items-center">
                        <img alt="Image of <?php echo $fetch_cart['ten_sanpham']; ?>" class="w-16 h-16 rounded-lg mr-4" 
                        src="<?php echo isset($fetch_cart['image']) ? "../image/image_sp/" . $fetch_cart['image'] : 'default_image.jpg'; ?>" />
                        <?php echo $fetch_cart['ten_sanpham']; ?>
                    </td>
                    <td class="p-4"><?php echo number_format($fetch_cart['gia']); ?> VND</td>
                    <td class="p-4">
                        <form action="" class="flex items-center" method="post">
                            <input name="cart_id" type="hidden" value="<?php echo $fetch_cart['id_giohang']; ?>"/>
                            <input class="border p-2 w-16" min="1" name="cart_quantity" type="number" value="<?php echo $fetch_cart['soluong']; ?>"/>
                            <button class="ml-2 bg-gray-200 p-2 rounded" name="update_cart" type="submit">Cập nhật</button>
                        </form>
                    </td>
                    <td class="p-4"><?php echo number_format($sub_total); ?> VND</td>
                    <td class="p-4">
                        <a class="text-gray-500" href="giohang.php?delete=<?php echo $fetch_cart['id_giohang']; ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này?');">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td class="text-center py-4" colspan="5">Giỏ hàng của bạn trống</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- Các phần còn lại không đổi -->
        <div class="flex justify-between items-center mb-6">
            <a class="back-link" href="#"><i class="fas fa-arrow-left"></i> Quay Lại Trang Sản Phẩm</a>
            <div class="actions">
                <a href="giohang.php?delete_all" class="bg-gray-200 p-2 rounded">HỦY TẤT CẢ</a>
            </div>
        </div>
        <div class="container">
        <div class="flex justify-between items-center mb-6">
            <div class="coupon">
                <label for="coupon">Phiếu Ưu Đãi</label>
                <input id="coupon" type="text" placeholder="Nhập phiếu ưu đãi của bạn nếu có"/>
                <button>ÁP DỤNG</button>
            </div>
            <div class="summary">
                <div>
                    <div>Tổng Giỏ Hàng</div>
                    <div>TỔNG PHỤ</div>
                    <div class="total"><?php echo number_format($grand_total); ?> VND</div>
                    <div>TỔNG</div>
                    <div class="total"><?php echo number_format($grand_total + 30000); ?> VND</div>
                </div>
                <button class="checkout">TIẾN HÀNH THANH TOÁN</button>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
