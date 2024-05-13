<?php
include 'connect.php';

// Xác định mã sinh viên cần xóa
if(isset($_GET['masv'])) {
    $masv = $_GET['masv'];
    
    // Thực hiện xóa sinh viên
    $sql = "DELETE FROM sinhvien WHERE masv=$masv";
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng người dùng về trang index.php sau khi xóa
        header('Location: index.php');
        exit();
    } else {
        echo "Lỗi khi xoá sinh viên: " . $conn->error;
    }
}

$conn->close();
?>
