<?php
include('../Model/connect.php');

if(isset($_POST['register'])) { 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    // Chỉ kiểm tra email
    $select_email = mysqli_query($conn, "SELECT * FROM `nguoidung` WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select_email) > 0) {
        echo "<script>alert('Tài khoản đã tồn tại')</script>";
        ;
    } else {
        if($pass != $cpass) {
            echo "<script>alert('Mật khẩu nhập lại sai')</script>";
        } else {
            mysqli_query($conn, "INSERT INTO `nguoidung`(tennguoidung, email, matkhau) VALUES('$name', '$email', '$pass')") or die('query failed');
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Cửa hàng cà phê - Đăng ký</title>
</head>
<body>
    <div class="main-container">
        <section>
            <div class="form-container" id="admin-login">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tạo tài khoản mới</h3>
                    <div class="input-filed">
                        <label for="">Tài khoản <sup>*</sup></label>
                        <input type="text" name="name" maxlength="20" required placeholder="Tên tài khoản">
                    </div>

                    <div class="input-filed">
                        <label for="">Email <sup>*</sup></label>
                        <input type="email" name="email" maxlength="20" required placeholder="Email">
                    </div>

                    <div class="input-filed">
                        <label for="">Mật khẩu<sup>*</sup></label>
                        <input type="password" name="password" maxlength="20" required placeholder="Mật khẩu">
                    </div>

                    <div class="input-filed">
                        <label for="">Nhập lại mật khẩu<sup>*</sup></label>
                        <input type="password" name="cpassword" maxlength="20" required placeholder="Nhập lại mật khẩu">
                    </div>
                    <button type="submit" name="register" class="btn">Đăng ký</button> 
                    <p>Bạn đã có tài khoản? <a href="../View/login.php">Đăng nhập</a></p>
                </form>
            </div>
        </section>
    </div>
    
</body>
</html>
<!-- ===============================================================================================  -->
 <?php 
 include('../Model/connect.php');
 session_start();
 if(isset($_SESSION['user_id'])){
    $user_id= $_SESSION['user_id'];
 }else{
    $user_id='';
 }
 // dang ky
 if(isset($_POST['submit'])){
    $id = unique_id();
    $name = $_POST['name'];
    $name= filter_var($name,FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email= filter_var($email,FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass= filter_var($pass,FILTER_SANITIZE_STRING);
    $cpass = $_POST['cpass'];
    $cpass= filter_var($cpass,FILTER_SANITIZE_STRING);

    $select_users = $conn ->prepare("SELECT * FROM `nguoidung` WHERE email= ?");
    $select_users -> execute([ $email]);
    $row = $select_users->fetch_assoc();

    if ($select_users->num_rows > 0) { //num_rows
        echo '<script>alert("Email đã tồn tại")</script>';
    } else {
        if ($pass != $cpass) {
            echo '<script>alert("Mật khẩu không khớp")</script>';
        } else {
            // Chuẩn bị câu lệnh INSERT
            $sql = $conn->prepare("INSERT INTO `nguoidung` (id_nguoidung, tennguoidung, email, matkhau) VALUES (?, ?, ?, ?)");
            $sql->bind_param("isss", $id, $name, $email, $pass); // Thay thế `?` bằng các biến cụ thể
            $sql->execute();
    
            // Chuẩn bị câu lệnh SELECT
            $sql = $conn->prepare("SELECT * FROM `nguoidung` WHERE email = ? AND matkhau = ?");
            $sql->bind_param("ss", $email, $pass); // Thay thế `?` bằng các biến cụ thể
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->num_rows; // Kiểm tra số hàng lấy được

            if($_SESSION[])
        }
    }
    
    }
 }
 ?>
 <style type="text/css">
<?php include 'style.css' ;
?>
 </style>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Tea - Đăng ký </title>
 </head>
 <body>
    
 </body>
 </html>
