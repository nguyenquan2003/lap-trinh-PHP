<?php
include 'config.php';
function loadClass($c)
{
    // echo "class/$c.php";
    include "class/$c.php";
}
spl_autoload_register('loadClass');
$obj = new Category();//ham tao run

$n = $obj->store();
if ($n > 0) //ok
{
    ?>
    <script>
        alert('Da thêm ....');
        window.location = 'cat_index.php';
    </script>
    <?php
    exit;
}

if ($n == -1) //ok
{
    ?>
    <script>
        alert('Trùng khóa ....');
        window.history.back();
    </script>
    <?php
    exit;
}

if ($n == 0) //ok
{
    ?>
    <script>
        alert('Không thêm được ....');
        window.location= 'cat_index.php';
    </script>
    <?php
    exit;
}