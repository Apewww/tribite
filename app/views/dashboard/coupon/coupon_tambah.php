<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header('Location: /home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $deskripsi = $_POST['deskripsi'];
    $tipe_diskon = $_POST['tipe_diskon'];
    $nilai_diskon = floatval($_POST['nilai_diskon']);
    $minimal_belanja = floatval($_POST['minimal_belanja']);
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("CALL AddKupon(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiisss", $kode, $deskripsi, $tipe_diskon, $nilai_diskon, $minimal_belanja, $tanggal_mulai, $tanggal_berakhir, $status);

    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di tambahkan!"];
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
        $_SESSION['notif'] = ["Warn", "Gagal menambahkan kupon!: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();
    echo "Mulai: " . $_POST['tanggal_mulai'] . "<br>";
    echo "Berakhir: " . $_POST['tanggal_berakhir'] . "<br>";

    // echo $nama;
    // echo $deskripsi;
    header('Location: /couponmanage');
    exit;
}
?>