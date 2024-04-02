<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: cau3.php");
    exit();
}
echo "Xin chào, " . $_SESSION['username'] . "!";
echo "<br><a href='logout.php'>Đăng xuất</a>";