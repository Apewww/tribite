<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $deskripsi = $_POST['deskripsi'];
    $tipe = $_POST['tipe_diskon'];
    $nilai = $_POST['nilai_diskon'];
    $min_belanja = $_POST['minimal_belanja'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("CALL UpdateKupon(?, ?, ?, ? ,? ,? ,? ,? ,?)");
    $stmt->bind_param("isssissss", $id, $kode, $deskripsi, $tipe, $nilai, $min_belanja, $tanggal_mulai, $tanggal_berakhir, $status);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di update!"];
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
        $_SESSION['notif'] = ["Warn", "Gagal update kupon!: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    // echo $nama;
    // echo $deskripsi;
    header('Location: /couponmanage');
    exit;
}
?>