<?php

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "qlbantra";
$conn = new mysqli($severname, $username , $password,$dbname);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <style>
        .submenu {
            display: none;
        }
        .submenu.active {
            display: block;
        }
    </style>
    <script>
        function toggleSubmenu(id) {
            var submenu = document.getElementById(id);
            submenu.classList.toggle('active');
        }
    </script>
</head>

<body class="font-roboto bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white h-screen shadow-md">
            <div class="p-6">
                <div class="text-2xl font-bold text-gray-800 mb-6">ampleadmin</div>
                <div class="sidebar-item">
                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu1')">Quản lý thành viên</h3>
                    <div id="submenu1" class="submenu mb-4">
                        <a href="../Admin/list_user.php" class="text-gray-600 hover:text-gray-800">Danh sách thành viên</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu2')">Quản lý sản phẩm</h3>
                    <div id="submenu2" class="submenu mb-4">
                        <a href="../Admin/list_sp.php" class="text-gray-600 hover:text-gray-800">Danh sách sản phẩm</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu3')">Quản lý doanh mục</h3>
                    <div id="submenu3" class="submenu mb-4">
                        <a href="../Admin/list_dm.php" class="text-gray-600 hover:text-gray-800">Danh sách doanh mục</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu4')">Quản lý bình luận</h3>
                    <div id="submenu4" class="submenu mb-4">
                        <a href="#" class="text-gray-600 hover:text-gray-800">Danh sách bình luận</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu5')">Quản lý tin nhắn</h3>
                    <div id="submenu5" class="submenu mb-4">
                        <a href="#" class="text-gray-600 hover:text-gray-800">Thông tin tin nhắn</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu6')">Quản lý chữ</h3>
                    <div id="submenu6" class="submenu mb-4">
                        <a href="#" class="text-gray-600 hover:text-gray-800">Bảng tin nhắn chạy</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu7')">Quản lý phần đơn hàng</h3>
                    <div id="submenu7" class="submenu mb-4">
                        <a href="#" class="text-gray-600 hover:text-gray-800">Danh sách đơn hàng đặt</a>
                    </div>

                    <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu8')">Quản lý quảng cáo</h3>
                    <div id="submenu8" class="submenu mb-4">
                        <a href="#" class="text-gray-600 hover:text-gray-800">Danh sách quảng cáo</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <div class="flex justify-between items-center p-6 bg-white shadow-md">
                <div class="text-2xl font-bold">TRANG QUẢN TRỊ</div>
                <div class="flex items-center">
                    <input class="border rounded py-1 px-3 mr-4" type="text" placeholder="Search..."/>
                    <div class="flex items-center">
                        <img class="rounded-full mr-2" src="../image/avatar.png" alt="User profile picture" width="40" height="40"/>
                        <span>Steave</span>
                    </div>
                </div>
            </div>
            <!-- Marquee -->
            <div class="bg-gray-200 py-2 px-6">
                <marquee class="text-gray-600">Welcome to the Dashboard! Stay updated with the latest information.</marquee>
            </div>
            <div class="p-6">
                <!-- Dashboard Info -->
                <div class="grid grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-6 rounded shadow">
                        <div class="text-3xl font-bold text-green-500">1200</div>
                        <div class="text-gray-600">Đơn hàng</div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <div class="text-3xl font-bold text-purple-500">52</div>
                        <div class="text-gray-600">Bình luận</div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <div class="text-3xl font-bold text-blue-500">2400</div>
                        <div class="text-gray-600">Thành viên</div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <div class="text-3xl font-bold text-red-500">1000.2k</div>
                        <div class="text-gray-600">Người xem</div>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-4">Giới thiệu</h3>
                <p>Green Tea – Nơi Hương Vị Thiên Nhiên Hòa Quyện Với Phong Cách Trẻ Trung 🌱💚</p>
                <p>Chào mừng bạn đến với Green Tea – không gian của những ai yêu trà xanh và phong cách sống lành mạnh! Green Tea không chỉ là cửa hàng, mà còn là một hành trình đưa bạn khám phá từng hương vị trà xanh nguyên chất, tinh tế, được chăm chút từ những vườn trà thiên nhiên trứ danh. Từ những ly trà đá mát lạnh giải nhiệt ngày hè đến những tách trà nóng ấm lòng mùa đông, mỗi sản phẩm đều mang đậm dấu ấn riêng, hứa hẹn mang đến trải nghiệm đáng nhớ cho mọi thực khách.</p>
                <p>Điều gì khiến Green Tea trở nên đặc biệt?</p>
                <p>🌟 Chất lượng đỉnh cao: Được tuyển chọn từ những búp trà tinh túy nhất, sản phẩm của Green Tea Hub cam kết nguyên chất, không pha tạp và hoàn toàn an toàn cho sức khỏe, để bạn yên tâm tận hưởng hương vị thiên nhiên thuần khiết nhất.</p>
                <p>🌍 Bảo vệ môi trường: Green Tea không chỉ là thưởng trà mà còn là bảo vệ hành tinh xanh. Mọi sản phẩm đều được đóng gói trong bao bì thân thiện với môi trường, giúp bạn vừa thưởng thức vừa góp phần bảo vệ thiên nhiên.</p>
                <p>💫 Phong cách trẻ trung, trải nghiệm tối giản: Giao diện website của chúng tôi được thiết kế năng động, dễ sử dụng và đậm chất hiện đại, giúp bạn dễ dàng mua sắm chỉ với vài cú click. Các sản phẩm trà không chỉ ngon mà còn đẹp mắt, sẵn sàng làm nổi bật không gian của bạn và mang đến cảm giác thư thái.</p>
                <p>🎉 Ưu đãi cực chất, quà tặng bất ngờ: Luôn có những chương trình khuyến mãi hấp dẫn và các món quà độc đáo dành riêng cho bạn khi đến với Green Tea Hub. Đừng quên theo dõi để không bỏ lỡ nhé!</p>
                <p>Hãy đến với Green Tea Hub để trải nghiệm thế giới trà xanh độc đáo, đầy phong cách và tinh thần tự do– nơi mỗi ngụm trà không chỉ là một thức uống mà còn là khoảnh khắc gắn kết và khám phá chính mình.</p>
            </div>
        </div>
    </div>
</body>

</html>