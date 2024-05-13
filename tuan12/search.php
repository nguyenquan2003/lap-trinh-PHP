<?php
function timKiemSinhVien($keyword) {
    global $conn;
    $sql = "SELECT * FROM sinhvien WHERE hoten LIKE '%$keyword%' OR email LIKE '%$keyword%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Mã SV: " . $row["masv"]. " - Họ và tên: " . $row["hoten"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "Không tìm thấy sinh viên nào";
    }
}
?>
