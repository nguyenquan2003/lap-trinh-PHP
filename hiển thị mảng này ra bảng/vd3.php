<?php
// $m =[];
// $m[] = 5; //$m[0]=5
// $m[]=10; //$m[1]=10

// // Duyệt mảng $m và in ra giá trị cùng với chỉ mục
// foreach ($m as $key => $value) {
//     echo $key . "=>int " . $value . "<br>";
// }

$r =['id' => 1, 'name' => 'Laptop', 'img' => 'laptop.jpg', 'price' =>200];
$m[] = $r; //$m[0]=$r
$r = ['id' => 2, 'name' => 'Mouse', 'img' => 'mouse.jpg', 'price' => 10];
$m[] = $r;
$r = ['id' => 3, 'name' => 'Keyboard', 'img' => 'keyboard.jpg', 'price' => 20];
$m[] = $r; //$m là mảng 2 chiều
?>
<table border="1">
<tr>
    <td colspan="4">Danh mục sản phẩm</td>
</tr>
<tr>
    <td>ID</td>
    <td>Name</td>
    <td>Price</td>
    <td>Image</td>
</tr>
<?php
foreach ($m as $v) {
?>
<tr>
    <td><?php echo $v['id'] ?></td>
    <td><?php echo $v['name'] ?></td>
    <td><?php echo $v['price'] ?></td>
    <td><img src="img/<?php echo $v['img'] ?>" alt="" width="150"></td>
</tr>
<?php
}
?>
</table>
