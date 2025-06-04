<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambarTmp = $_FILES['gambar']['tmp_name'];
        $gambarName = basename($_FILES['gambar']['name']);
        $gambarName = preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $gambarName);
        $targetPath = UPLOAD_PATH . $gambarName;

        if (!is_dir(UPLOAD_PATH)) {
            mkdir(UPLOAD_PATH, 0777, true);
        }

        if (move_uploaded_file($gambarTmp, $targetPath)) {
            $gambar = UPLOAD_PATH . $gambarName;
        } else {
            $_SESSION['notif'] = ["Warn", "Gagal mengunggah gambar."];
            header('Location: /katalogmanage');
            exit;
        }
    } 


    $stmt = $conn->prepare("CALL UpdateKatalog(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issisis", $id, $nama, $deskripsi, $harga, $gambar, $kategori, $status);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di update!"];
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
        $_SESSION['notif'] = ["Warn", "Gagal update katalog!: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    // echo $nama;
    // echo $deskripsi;
    header('Location: /katalogmanage');
    exit;
}
?>