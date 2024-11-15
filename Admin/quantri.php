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
    <link rel="stylesheet" href="../Admin/CSS/admin.css">
    
</head>


<body>
    
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php include('menu.php')?>
            
        </div>
        

        <!-- Main Content -->
        <div class="main-content">
        <div class="header1">
                <div class="text-2xl font-bold">TRANG QUẢN TRỊ</div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <div class="profile">
                        <img src="../image/avatar.png">
                        <span>Steave</span>
                    </div>
                </div>
            <div class="dashboard-info">
                <div class="info-box">
                    <p>1200</p>
                    <p>Đơn hàng</p>
                </div>
                <div class="info-box">
                    <p>52</p>
                    <p>Bình luận</p>
                </div>
                <div class="info-box">
                    <p>2400</p>
                    <p>Thành viên</p>
                </div>
                <div class="info-box">
                    <p>1000.2k</p>
                    <p>Người xem</p>
                </div>
            </div>
            <h3>Giới thiệu</h3>
            <p>Green Tea – Nơi Hương Vị Thiên Nhiên Hòa Quyện Với Phong Cách Trẻ Trung 🌱💚
                <p>Chào mừng bạn đến với Green Tea – không gian của những ai yêu trà xanh và phong cách sống lành mạnh!
                    Green Tea không chỉ là cửa hàng, mà còn là một hành trình đưa bạn khám phá từng hương vị trà xanh nguyên
                    chất, tinh tế, được chăm chút từ những vườn trà thiên nhiên trứ danh. Từ những ly trà đá mát lạnh giải
                    nhiệt ngày hè đến những tách trà nóng ấm lòng mùa đông, mỗi sản phẩm đều mang đậm dấu ấn riêng, hứa hẹn
                    mang đến trải nghiệm đáng nhớ cho mọi thực khách.</p>
    
                <p>Điều gì khiến Green Tea trở nên đặc biệt?</p>
    
                <p>
                    🌟 Chất lượng đỉnh cao: Được tuyển chọn từ những búp trà tinh túy nhất, sản phẩm của Green Tea Hub cam
                    kết nguyên chất, không pha tạp và hoàn toàn an toàn cho sức khỏe, để bạn yên tâm tận hưởng hương vị
                    thiên nhiên thuần khiết nhất.
                </p>
    
                <p>🌍 Bảo vệ môi trường: Green Tea không chỉ là thưởng trà mà còn là bảo vệ hành tinh xanh. Mọi sản phẩm
                    đều được đóng gói trong bao bì thân thiện với môi trường, giúp bạn vừa thưởng thức vừa góp phần bảo vệ
                    thiên nhiên.</p>
                <p>
                    💫 Phong cách trẻ trung, trải nghiệm tối giản: Giao diện website của chúng tôi được thiết kế năng động,
                    dễ sử dụng và đậm chất hiện đại, giúp bạn dễ dàng mua sắm chỉ với vài cú click. Các sản phẩm trà không
                    chỉ ngon mà còn đẹp mắt, sẵn sàng làm nổi bật không gian của bạn và mang đến cảm giác thư thái.
    
                </p>
                <p>
                    🎉 Ưu đãi cực chất, quà tặng bất ngờ: Luôn có những chương trình khuyến mãi hấp dẫn và các món quà độc
                    đáo dành riêng cho bạn khi đến với Green Tea Hub. Đừng quên theo dõi để không bỏ lỡ nhé!
    
                </p>
                <p>
                    Hãy đến với Green Tea Hub để trải nghiệm thế giới trà xanh độc đáo, đầy phong cách và tinh thần tự do–
                    nơi mỗi ngụm trà không chỉ là một thức uống mà còn là khoảnh khắc gắn kết và khám phá chính mình.
                </p>
    
    
            </p>
            <!-- Add more content here as needed -->
        </div>
    </div>
    
</body>

</html>