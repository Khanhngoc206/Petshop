<?php
$servername = "localhost";
$username = "root"; // mặc định là "root"
$password = ""; // để trống nếu bạn không đặt mật khẩu
$dbname = "quanlythucung"; // tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>
