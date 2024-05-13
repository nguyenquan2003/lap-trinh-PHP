<?php
function hienThiSinhVien() {
    global $conn;
    $sql = "SELECT * FROM sinhvien";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Mã SV: " . $row["masv"]. " - Họ và tên: " . $row["hoten"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "Không có sinh viên nào trong cơ sở dữ liệu";
    }
}
?>
