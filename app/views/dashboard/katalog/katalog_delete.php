<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("CALL DeleteKatalog(?)");
    $stmt->bind_param("i", $id);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di Delete!"];
    } catch (mysqli_sql_exception $e) {
        $_SESSION['notif'] = ["Warn", "Gagal delete akun: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    header('Location: /katalogmanage');
    exit;
}
?>