<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: cau3.php");
    exit();
}
echo "Trang quản lý sản phẩm";
echo "<br><a href='logout.php'>Đăng xuất</a>";