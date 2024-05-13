<?php
include 'config.php';
function loadClass($c)
{
    // echo "class/$c.php";
    include "class/$c.php";
}
spl_autoload_register('loadClass');
$obj = new Category();//ham tao run

$cat_id= $_GET['cat_id']??'';
$n = $obj->destroy($cat_id);
if ($n > 0) //ok
{
    ?>
    <script>
        alert('Da xoa ....');
        window.location = 'cat_index.php';
    </script>
    <?php
    exit;
}

if ($n == -1) //ok
{
    ?>
    <script>
        alert('Có loại sách này, không xóa ....');
        window.history.back();
    </script>
    <?php
    exit;
}

if ($n == 0) //ok
{
    ?>
    <script>
        alert('Lỗi xóa ....');
        window.location= 'cat_index.php';
    </script>
    <?php
    exit;
}