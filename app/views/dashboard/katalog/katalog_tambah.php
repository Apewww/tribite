<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    } else {
        $_SESSION['notif'] = ["Warn", "Tidak ada gambar yang diunggah atau terjadi error."];
        header('Location: /katalogmanage');
        exit;
    }

    // echo $nama; echo "<br>";
    // echo $deskripsi; echo "<br>";
    // echo $harga; echo "<br>";
    // echo $kategori; echo "<br>";
    // echo $status; echo "<br>";
    // echo $gambarTmp;

    $stmt = $conn->prepare("CALL AddKatalog(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisis", $nama, $deskripsi, $harga, $gambar, $kategori, $status);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di tambahkan!"];
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
        $_SESSION['notif'] = ["Warn", "Gagal menambahkan katalog!: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    // echo $nama;
    // echo $deskripsi;
    header('Location: /katalogmanage');
    exit;
}
?>