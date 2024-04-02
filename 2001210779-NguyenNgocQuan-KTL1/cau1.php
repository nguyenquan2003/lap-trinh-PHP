<form action="cau1.php" method='post' enctype="multipart/form-data">
    MSSV: <input type="text" name="mssv" id="mssv" onBlur="validateMSSV()"> <br>
    Họ tên: <input type="text" name="hoten"> <br>
    Giới tính: <input type="radio" name="gioitinh" value='Nam'>Nam 
        <input type="radio" name="gioitinh" value='Nữ'>Nữ<br>
    Sở thích: <input type="checkbox" name="sothich[]" value='Thể thao'>Thể thao 
    <input type="checkbox" name="sothich[]" value='Du lịch'>Du lịch <br>
    Hình đại diện: <input type="file" name="hinh" id=""> <br>
    <input type="submit" value="Gửi">
</form>
<script>
function validateMSSV() {
    var mssvInput = document.getElementById('mssv').value;
    var regex = /^SV\d{3}$/;
    if (!regex.test(mssvInput)) {
        alert('Mã sinh viên không hợp lệ. Mã phải bắt đầu bằng "SV" và theo sau là 3 số.');
    }
}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = htmlspecialchars($_POST['mssv']);
    $hoten = htmlspecialchars($_POST['hoten']);
    $gioitinh = htmlspecialchars($_POST['gioitinh']);
    $sothich = $_POST['sothich'] ?? [];
    echo "MSSV: $mssv<br>";
    echo "Họ tên: $hoten<br>";
    echo "Giới tính: $gioitinh<br>";
    echo "Sở thích: " . implode(", ", $sothich) . "<br>";
    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
        $allowed = ['jpg' => 'image/jpeg', 'png' => 'image/png'];
        $fileType = $_FILES['hinh']['type'];
        $fileSize = $_FILES['hinh']['size'];
        if (!in_array($fileType, $allowed) || $fileSize > 500 * 1024) {
            echo "File không hợp lệ.";
        } else {
            $tempName = $_FILES['hinh']['tmp_name'];
            $path = "hinh/" . $_FILES['hinh']['name'];
            if (move_uploaded_file($tempName, $path)) {
                echo "<img src='$path' style='max-width: 200px; height: auto;'><br>";
            } else {
                echo "Không thể upload file.";
            }
        }
    }
}
?>
