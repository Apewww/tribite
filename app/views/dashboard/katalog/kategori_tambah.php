<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare("CALL AddKategori(?, ?)");
    $stmt->bind_param("ss", $nama, $deskripsi);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di tambahkan!"];
    } catch (mysqli_sql_exception $e) {
        $_SESSION['notif'] = ["Warn", "Gagal menambahkan kategori!: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    // echo $nama;
    // echo $deskripsi;
    header('Location: /katalogmanage');
    exit;
}
?>