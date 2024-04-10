<?php
// Khai báo các biến để lưu thông tin đăng nhập và thông báo lỗi (nếu có)
$username = "";
$password = "";
$error = "";

// Kiểm tra xem đã gửi dữ liệu từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    if ($username === 'admin' && $password === '123456') {
        // Thông tin đăng nhập chính xác, in kết quả ra màn hình
        echo "<h2>Đăng nhập thành công!</h2>";
        // Dừng thực thi kịch bản
        exit;
    } else {
        // Thông tin đăng nhập không chính xác, hiển thị thông báo lỗi
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
