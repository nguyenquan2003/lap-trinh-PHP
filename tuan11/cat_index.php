<?php
include 'config.php';
function loadClass($c)
{
    // echo "class/$c.php";
    include "class/$c.php";
}
spl_autoload_register('loadClass');
$obj = new Category();//ham tao run
$dataCat = $obj->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Category</h1>
    <h3><a href="cat_crate.php">Thêm mới</a></h3>
    <table border="1">
        <?php
        foreach ($dataCat as $item) {
            ?>
            <tr>
                <td style="width: 100px;"><?php echo $item->cat_id ?></td>
                <td style="width: 300px;"><?php echo $item->cat_name ?></td>
                <td>
                    <a href="cat_delete.php?cat_id=<?php echo $item->cat_id ?>">Xóa</a>
                </td>
                <td>
                    <a href="cat_edit.php?cat_id=<?php echo $item->cat_id ?>">Chỉnh sửa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>