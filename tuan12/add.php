<?php
include 'connect.php';

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

$conn->close();
?>
