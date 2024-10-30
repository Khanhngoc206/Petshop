<?php
// Kết nối đến cơ sở dữ liệu
include 'db.php'; // Đảm bảo rằng bạn đã có tệp db.php để kết nối đến cơ sở dữ liệu

session_start(); // Bắt đầu phiên làm việc

// Khởi tạo biến
$username = "";
$password = "";
$error = "";

// Xử lý khi người dùng nhấn nút đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn để kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem người dùng có tồn tại hay không
    if (mysqli_num_rows($result) > 0) {
        // Lưu thông tin người dùng vào phiên
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Chuyển hướng đến trang chính
    } else {
        $error = "Tên người dùng hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | KN PetShop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <?php if (!empty($error)) { echo "<div class='error'>$error</div>"; } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Đăng nhập</button>
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
    </div>
</body>
</html>
