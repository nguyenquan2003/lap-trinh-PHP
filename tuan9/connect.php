<?php
include 'config.php';
try {
    $conn = new PDO('mysql:host=' . HOST . '; dbname=' . DB, USER, PW);
    $conn->query('set names utf8');
} catch (PDOException $e) {
    echo 'Err';
    exit;
}