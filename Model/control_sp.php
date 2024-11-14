<?php
include('connect.php');

class data_sp
{
    
    public function insert_product($ten_sanpham, $gia, $image, $thongtinchitiet_sanpham, $trangthai_sanpham, $doanhmuc)
    {
        global $conn;
        $sql = "INSERT INTO sanpham (ten_sanpham, gia, image, thongtinchitiet_sanpham, trangthai_sanpham, doanhmuc)
                VALUES ('$ten_sanpham', '$gia', '$image', '$thongtinchitiet_sanpham', '$trangthai_sanpham', '$doanhmuc')";
        $run = mysqli_query($conn, $sql);
        
        return $run;
    }
    function select_product()
    {
        global $conn;
        $sql = "SELECT * FROM sanpham";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function select_product_id($id)
    {
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function update_product($id, $ten_sanpham, $gia, $image, $thongtinchitiet_sanpham, $trangthai_sanpham, $doanhmuc)
    {
        global $conn;
        $sql = "UPDATE sanpham SET ten_sanpham='$ten_sanpham', gia='$gia', image='$image', thongtinchitiet_sanpham='$thongtinchitiet_sanpham', trangthai_sanpham='$trangthai_sanpham', doanhmuc = '$doanhmuc' WHERE id_sanpham ='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function delete_product($id)
    {
        global $conn;
        $sql = "DELETE FROM sanpham WHERE id_sanpham='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_categories()
    {
        global $conn;
        $sql = "SELECT id_dm, ten_dm FROM doanhmuc";  // Truy vấn cột id_dm và ten_dm từ bảng danh mục

        // Thực hiện câu lệnh truy vấn
        $result = $conn->query($sql);

        // Kiểm tra nếu có kết quả
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);  // Trả về tất cả danh mục dưới dạng mảng
        } else {
            echo "Không có danh mục nào.";
            return [];  // Nếu không có dữ liệu
        }
    }
}
