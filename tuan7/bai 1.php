<?php
$servername = "localhost";
$username = "b32_36094709"; // Tên đăng nhập vào database
$password = "1234567890"; // Mật khẩu truy cập
$dbname = "b32_36094709_sinhvien"; // Tên cơ sở dữ liệu

try {
    // Kết nối với database sử dụng PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi cho PDO thành Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Viết câu truy vấn SQL
$sql = "SELECT * FROM sinhvien";

// Thực thi câu truy vấn SQL
$stmt = $conn->query($sql);

// Lấy dữ liệu trả về dưới dạng đối tượng
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

// Đóng kết nối
$conn = null;
?>

<!-- Tạo bảng HTML để hiển thị dữ liệu -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Ngày Sinh</th>
    </tr>
    <?php foreach ($data as $row) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row->id); ?></td>
            <td><?php echo htmlspecialchars($row->ten); ?></td>
            <td><?php echo htmlspecialchars($row->email); ?></td>
            <td><?php echo htmlspecialchars($row->ngaysinh); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
