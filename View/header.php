<!-- chưa gọi đc thông tin người dùng -->
<header class="header">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        button {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 5px 15px;
            font-size: 25px;
            
            /* Khoảng cách giữa input và icon */
        }

        button input {
            border: none;
            outline: none;
            padding: 5px;
            flex-grow: 1;
            border-radius: 8px;
            /* Để input chiếm hết chiều rộng có sẵn */
        }
    </style>
    <!-- <style="position: fixed; left: 7%; top: 5%; background-image: url('../image/body-bg.jpg'); height: 100%; width: 85vw; z-index: 101; transition: .3s; box-shadow: var(--box-shadow); padding: 1rem;"> -->
    <div class="flex">
        <a href="/View/home.php" class="logo"><img src="../image/logo.jpg"></a>
        <nav class="navbar">
            <a href="home.php">Trang Chủ </a>
            <a href="sanpham.php">Sản Phẩm </a>
            <a href="donhang.php">Đơn Hàng </a>
            <a href="gioithieu.php">Giới Thiệu </a>
            <a href="lienhe.php">Liên Hệ</a>
        </nav>
        <div class="search-container">

            <button type="submit">
                <input size="30px" placeholder="Tìm kiếm..." type="text" /><i class="fas fa-search"></i>
            </button>
        </div>
        <div class="icons">
            <i class="fas fa-user" id="user-btn"></i>
            <a href="danhsachyeuthich.php" class="giohang-btn"><i class="fas fa-heart"></i></a>
            <a href="giohang.php" class="giohang-btn"><i class="fas fa-shopping-cart"></i></a>
            <i class="bx bx-danhsach-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <p>Username: <span><?php //echo $_SESSION['user_name']; 
                                ?></span></p>
            <p>Email: <span><?php //echo $_SESSION['user_email']; 
                            ?></span></p>
            <a href="login.php" class="btn">Đăng Nhập </a>
            <a href="dangky.php" class="btn">Đăng Ký </a>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">Đăng Xuất</button>
            </form>

        </div>
</header>