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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <?php include '../View/header.php' ?>
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
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
