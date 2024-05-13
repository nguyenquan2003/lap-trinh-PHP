<?php
include 'connect.php'; // Kết nối đến cơ sở dữ liệu
include 'show.php'; // Gọi hàm hiển thị sinh viên
include 'search.php';

// Hiển thị tiêu đề
echo "<h2>Danh sách sinh viên</h2>";

// Kiểm tra xem có thông báo về việc thêm sinh viên mới không
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo "<p style='color: green;'>Thêm sinh viên thành công!</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    
    // Thực hiện tìm kiếm sinh viên theo từ khóa
    timKiemSinhVien($keyword);
} else {
    // Nếu không có từ khóa tìm kiếm, hiển thị toàn bộ danh sách sinh viên
    hienThiSinhVien();
}

// Lấy dữ liệu sinh viên từ cơ sở dữ liệu
$sql = "SELECT sinhvien.masv, sinhvien.hoten, sinhvien.email, lop.tenlop 
        FROM sinhvien 
        INNER JOIN lop ON sinhvien.malop = lop.malop
        ORDER BY sinhvien.masv"; // Sắp xếp theo mã sinh viên
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Bắt đầu bảng
    echo "<table border='1'>";
    echo "<tr><th>Mã SV</th><th>Họ và tên</th><th>Email</th><th>Lớp</th><th>Thao tác</th></tr>";
    
    // Hiển thị dữ liệu trong từng hàng của bảng
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["masv"]."</td>";
        echo "<td>".$row["hoten"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["tenlop"]."</td>";
        echo "<td><a href='delete.php?masv=".$row["masv"]."'>Xóa</a></td>";
        echo "</tr>";
    }
    
    // Kết thúc bảng
    echo "</table>";
} else {
    echo "Không có sinh viên nào trong cơ sở dữ liệu";
}
// Xử lý khi người dùng gửi thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $malop = $_POST['malop'];
    
    // Thêm sinh viên vào cơ sở dữ liệu
    $sql = "INSERT INTO sinhvien (hoten, email, malop) VALUES ('$hoten', '$email', $malop)";
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng người dùng về trang index.php sau khi thêm
        header('Location: index.php?success=true');
        exit();
    } else {
        echo "Lỗi khi thêm sinh viên: " . $conn->error;
    }
}

// Lấy danh sách lớp
$sql_lop = "SELECT * FROM lop";
$result_lop = $conn->query($sql_lop);
$ds_lop = [];
if ($result_lop->num_rows > 0) {
    while($row_lop = $result_lop->fetch_assoc()) {
        $ds_lop[] = $row_lop;
    }
}

echo "<br><h2>Tìm sinh viên</h2>";
echo "<form action='' method='GET'>";
echo "<label for='keyword'>Tìm sinh viên theo tên:</label>";
echo "<input type='text' id='keyword' name='keyword' required>";
echo "<input type='submit' value='Tìm'>";
echo "</form>";

$conn->close();
?>

<!-- Form nhập thông tin sinh viên -->
<h2>Thêm sinh viên</h2>
<form action="add.php" method="post">
    <label for="hoten">Họ và tên:</label><br>
    <input type="text" id="hoten" name="hoten" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="malop">Lớp:</label><br>
    <select id="malop" name="malop">
        <?php foreach ($ds_lop as $lop) { ?>
            <option value="<?php echo $lop['malop']; ?>"><?php echo $lop['tenlop']; ?></option>
        <?php } ?>
    </select><br><br>
    <input type="submit" value="Thêm sinh viên">
</form>
