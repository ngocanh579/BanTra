<?php

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "qlbantra";
$conn = new mysqli($severname, $username , $password,$dbname);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
</head>
<body>
    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            
            <div class="sidebar-item">
                <h3>Quản lý thành viên</h3>
                <div>
                    <a href="../Admin/list_user.php" class="item">Danh sách thành viên</a>
                </div>

                <h3>Quản lý sản phẩm</h3>
                <div>
                    <a href="../Admin/list_sp.php" class="item">Danh sách sản phẩm</a>
                </div>

                <h3>Quản lý doanh muc</h3>
                <div>
                    <a href="../Admin/list_dm.php" class="item">Danh sách doanh muc</a>
                </div>

                <h3>Quản lý bình luận</h3>
                <div>
                    <a href="#" class="item">Danh sách bình luận</a>
                </div>

                <h3>Quản lý tin nhắn</h3>
                <div>
                    <a href="#" class="item">Thông tin tin nhắn</a>
                </div>

                <h3>Quản lý chữ</h3>
                <div>
                    <a href="#" class="item">Bảng tin nhắn chạy</a>
                </div>

                            <h3>Quản lý phần đơn hàng</h3>
                <div>
                    <a href="#" class="item">Danh sách đơn hàng đặt</a>
                </div>
               
                <h3>Quản lý quảng cáo</h3>
                <div>
                    <a href="#" class="item">Danh sách quảng cáo</a>
                 </div>
            </div>
        </div>
        
    </div>
    
</body>

</html>