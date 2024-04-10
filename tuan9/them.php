<?php
include 'connect.php';
$book_id = $_POST['book_id'] ?? '';
if ($book_id == '') {
    header('location:index.php');
    exit;
}
$book_name = $_POST['book_name'] ?? '';
$price = $_POST['price'];
$description = $_POST['description'] ?? '';
$img = $_FILES['img']['name'];
$cat_id = $_POST['cat_id'] ?? '';
$pub_id = $_POST['pub_id'] ?? '';
$sql = "insert into book(book_id, book_name, price, description, img, cat_id, pub_id)
values(?, ?, ?, ?, ?, ?, ?) ";
$arr = [$book_id, $book_name, $price, $description, $img, $cat_id, $pub_id];
$stm = $conn->prepare($sql);
$stm->execute($arr);
move_uploaded_file($_FILES['img']['tmp_name'], "image_book/$img");
$conn = null;
header('location:index.php');