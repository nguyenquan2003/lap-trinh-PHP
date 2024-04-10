<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <?php
    // Khai báo biến lưu thông tin người dùng và thông báo lỗi (nếu có)
    $username = "";
    $password = "";
    $avatar = "";
    $error = "";

    // Kiểm tra xem đã gửi dữ liệu từ form chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy thông tin người dùng từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra thông tin đăng ký
        if ($username === 'admin' && $password === '123456') {
            // Kiểm tra xem đã upload hình ảnh lên không
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Đường dẫn tạm thời của tệp hình ảnh
                $tmp_name = $_FILES['avatar']['tmp_name'];

                // Kiểm tra kiểu tệp hình ảnh
                $image_info = getimagesize($tmp_name);
                if ($image_info !== false) {
                    // Di chuyển tệp hình ảnh vào thư mục lưu trữ cố định
                    $avatar = 'uploads/' . $_FILES['avatar']['name'];
                    move_uploaded_file($tmp_name, $avatar);
                } else {
                    $error = "Hình ảnh không hợp lệ!";
                }
            } else {
                $error = "Vui lòng chọn hình ảnh đại diện!";
            }

            // Nếu không có lỗi, in kết quả ra màn hình
            if (empty($error)) {
                echo "<h3>Đăng ký thành công!</h3>";
                echo "<p>Tên đăng nhập: $username</p>";
                echo "<p>Hình ảnh đại diện:</p>";
                echo "<img src='$avatar' alt='Avatar'>";
            }
        } else {
            // Thông tin đăng ký không chính xác, hiển thị thông báo lỗi
            $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }
    ?>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="avatar">Hình ảnh đại diện:</label><br>
        <input type="file" id="avatar" name="avatar" required><br><br>
        <input type="submit" value="Đăng ký">
    </form>
</body>
</html>
