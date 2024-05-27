<?php
include 'config.php';

if (isset($_GET['matinh'])) {
    $matinh = $_GET['matinh'];
    $stmt = $pdo->prepare("SELECT * FROM quanhuyen WHERE matinh = ?");
    $stmt->execute([$matinh]);
    $quanhuyens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($quanhuyens as $qh) {
        echo '<option value="' . $qh['maquanhuyen'] . '">' . $qh['tenquanhuyen'] . '</option>';
    }
}
?>
