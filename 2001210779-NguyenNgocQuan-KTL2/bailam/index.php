<?php
include 'config.php';
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM doanhnghiep WHERE madn = ?");
    $stmt->execute([$delete_id]);
    header("Location: index.php");
    exit();
}

$tinhStmt = $pdo->query("SELECT * FROM tinh");
$tinhs = $tinhStmt->fetchAll(PDO::FETCH_ASSOC);

$tinh = isset($_GET['city79']) ? $_GET['city79'] : '';
$quanhuyen = isset($_GET['district79']) ? $_GET['district79'] : '';
$keyword = isset($_GET['infor79']) ? $_GET['infor79'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

$query = "SELECT dn.*, qh.tenquanhuyen, t.tentinh FROM doanhnghiep dn
          JOIN quanhuyen qh ON dn.maquanhuyen = qh.maquanhuyen
          JOIN tinh t ON qh.matinh = t.matinh
          WHERE 1=1";

$params = [];

if ($tinh != "") {
    $query .= " AND t.matinh = ?";
    $params[] = $tinh;
    if ($quanhuyen != "") {
        $query .= " AND qh.maquanhuyen = ?";
        $params[] = $quanhuyen;
    }
}

if ($keyword != "") {
    $query .= " AND (dn.tendn LIKE ? OR dn.nguoidaidien LIKE ?)";
    $params[] = "%$keyword%";
    $params[] = "%$keyword%";
}

$totalQuery = $pdo->prepare($query);
$totalQuery->execute($params);
$totalResults = $totalQuery->rowCount();

$query .= " LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPages = ceil($totalResults / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai kiem tra 2</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="city79"]').change(function() {
                var matinh = $(this).val();
                $.ajax({
                    url: 'getDistricts.php',
                    type: 'GET',
                    data: { matinh: matinh },
                    success: function(data) {
                        $('select[name="district79"]').html(data);
                    }
                });
            });

            var selectedProvince = $('select[name="city79"]').val();
            if (selectedProvince) {
                var selectedDistrict = '<?php echo $quanhuyen; ?>';
                $.ajax({
                    url: 'getDistricts.php',
                    type: 'GET',
                    data: { matinh: selectedProvince },
                    success: function(data) {
                        $('select[name="district79"]').html(data);
                        if (selectedDistrict) {
                            $('select[name="district79"]').val(selectedDistrict);
                        }
                    }
                });
            }
        });
    </script>
</head>
<body>
    <h1 id="thongtinsinhvien">
        Ho ten SV: Nguyen Ngoc Quan <br> 
        - Ma so sinh vien: 2001210779
    </h1>
    <form action="index.php" method="get">
        <fieldset>
            <legend>Tìm kiếm thông tin</legend>
            Tỉnh thành 
            <select name="city79" id="">
                <option value="">-----</option>
                <?php foreach ($tinhs as $t) { ?>
                    <option value="<?php echo $t['matinh']; ?>" <?php if ($t['matinh'] == $tinh) echo 'selected'; ?>>
                        <?php echo $t['tentinh']; ?>
                    </option>
                <?php } ?>
            </select>
            Quận Huyện 
            <select name="district79" id="">
                <option value="">-----</option>
            </select>
            Thông tin 
            <input type="text" name="infor79" id="" placeholder="Tên DN và người đại diện" value="<?php echo htmlspecialchars($keyword); ?>"> 
            <input type="submit" value="Tìm kiếm">
        </fieldset>
    </form>
    <fieldset>
        <legend>Kết quả tìm kiếm</legend>
        <table border="1">
            <tr>
                <td>Mã DN</td>
                <td>Tên DN</td>
                <td>Người đại diện</td>
                <td>Tên quận huyện</td>
                <td>Xoá</td>
            </tr>
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['madn']; ?></td>
                    <td><?php echo $row['tendn']; ?></td>
                    <td><?php echo $row['nguoidaidien']; ?></td>
                    <td><?php echo $row['tenquanhuyen']; ?></td>
                    <td><a href="index.php?delete_id=<?php echo $row['madn']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa doanh nghiệp này?');">Xoá</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php if ($totalPages > 1) { ?>
            Trang
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a href="index.php?city79=<?php echo urlencode($tinh); ?>&district79=<?php echo urlencode($quanhuyen); ?>&infor79=<?php echo urlencode($keyword); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } ?>
        <?php } ?>
    </fieldset>
</body>
</html>