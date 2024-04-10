<?php
include 'connect.php';
$ten = $_GET['t'] ?? '';
$sql = "select * from book where book_name like ? ";
$arr = ["%$ten%"];
$stm = $conn->prepare($sql); $stm->execute($arr);
$data = $stm->fetchAll(PDO::FETCH_OBJ);
$stm = $conn->query('select * from category');
$dataCat = $stm->fetchAll(PDO::FETCH_OBJ);
$stm = $conn->query('select * from publisher');
$dataPub = $stm->fetchAll(PDO::FETCH_OBJ);
?>
<style>
    img.book {
        width: 50px;
    }
</style>
<form action="them.php" method="post" enctype="multipart/form-data">
    Mã <input type="text" name="book_id" id=""> <br><br>
    Tên <input type="text" name="book_name" id=""> <br><br>
    Giá <input type="number" name="price" id=""><br><br>
    Mô tả <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
    Hình <input type="file" name="img" id=""> <br><br>
    Loai <select name="cat_id" id=""><br><br>
        <?php
        foreach ($dataCat as $item) {
            echo "<option value='{$item->cat_id}'>{$item->cat_name}</option>";
        }
        ?>
    </select> <br>
    Nhaxb: <select name="pub_id" id=""><br><br>
        <?php
        foreach ($dataPub as $item) {
            echo "<option value='{$item->pub_id}'> {$item->pub_name}</option>";
        }
        ?>
    </select> <br>
    <input type="submit" value="Them">
</form>
<hr>
<form action="index.php" method="get">
    Ten <input type="text" name="t" id=""><input type="submit" value="Tim kiem">
</form>
<table border="1">
    <?php foreach ($data as $item) { ?>
        <tr>
            <td>
                <?php echo $item->book_id ?>
            </td>
            <td>
                <?php echo $item->book_name ?>
            </td>
            <td>
                <img class= book src="./image_book/<?php echo $item->img  ?>" alt="">

            </td>
            <td>#</td>
        </tr>
    <?php } ?>
</table>