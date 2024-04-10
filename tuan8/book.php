<?php 
function loadClass($c){
    include "class/$c.php";
}
spl_autoload_register('loadClass');
$sach = new Book();
$tatca =$sach->tatca();
// echo '<pre>';
//print_r($tatca);
$tensach = $_GET['ten']??'';
$timkiem = $sach->timkiemTheoTen($tensach);
// print_r($timkiem);
?>
<form action="book.php" method="get">
    Ten <input type="text" name="ten" id="" value="<?php echo $tensach ?>">
    <input type="submit" value="Tim kiem">
</form>
<table>
<?php 
    foreach($timkiem as $item)
    {
        ?>
        <tr>
            <td><?php echo $item->book_id ?></td>
            <td><?php echo $item->book_name ?></td>
            <td><?php echo $item->price ?></td>
        </tr>
        <?php
    }

?>