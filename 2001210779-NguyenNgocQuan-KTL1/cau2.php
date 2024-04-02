<?php 
$giohang=[
    ['ma'=>1, 'ten'=>'Iphone 15', 'soluong'=>1, 'dongia'=>28000000, 'img'=>'iphone.jpg'],
    ['ma'=>3, 'ten'=>'Samsung', 'soluong'=>2, 'dongia'=>30990000,  'img'=>'samsung.jpg'],
    ['ma'=>2, 'ten'=>'Man Hinh ', 'soluong'=>2, 'dongia'=>2100000, 'img'=>'manhinh.jpg'],
    ['ma'=>4, 'ten'=>'Mouse', 'soluong'=>3, 'dongia'=>1900000, 'img'=>'mouse.jpg'],
];
?>
<table border="1">
    <tr>
        <td colspan="6">DANH SÁCH SẢN PHẨM</td>
    </tr>
    <tr>
        <th>STT</th>
        <th>Tên Sản phẩm</th>
        <th>Hình</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>

    <?php
    $tong_tien = 0;
    foreach($giohang as $k => $sanpham){
        $thanh_tien = $sanpham['soluong'] * $sanpham['dongia'];
        $tong_tien += $thanh_tien;
    ?>
    <tr>
        <td><?php echo $sanpham['ma'] ?></td>
        <td><?php echo $sanpham['ten'] ?></td>
        <td><img src="hinh/<?php echo $sanpham['img'] ?>" width="300" height="200"/></td>
        <td><?php echo $sanpham['soluong'] ?></td>
        <td><?php echo number_format($sanpham['dongia'], 0, ',', '.') ?> VNĐ</td>
        <td><?php echo number_format($thanh_tien, 0, ',', '.') ?> VNĐ</td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="5" align="right">Tổng tiền:</td>
        <td><?php echo number_format($tong_tien, 0, ',', '.') ?> VNĐ</td>
    </tr>
</table>