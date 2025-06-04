<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    die("Anda belum login.");
}

$user_id = $_SESSION['user_id'];

// Cek apakah file diupload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);

    // Validasi ekstensi
    $ekstensi_diizinkan = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($ext), $ekstensi_diizinkan)) {
        die("Format file tidak didukung.");
    }

    // Buat nama file baru
    $nama_baru = $user_id . '.' . $ext;
    $path_relatif = "/tribite/assets/img/upload/profile/" . $nama_baru;
    $path_lengkap = $_SERVER['DOCUMENT_ROOT'] . $path_relatif;

    // Pindahkan file
    if (move_uploaded_file($tmp_file, $path_lengkap)) {
        try {
            $pdo = new PDO(DSN, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE akun SET picture = :picture WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':picture' => $path_relatif,
                ':id' => $user_id
            ]);

            header("Location: /profile");
            exit;
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    } else {
        die("Gagal menyimpan file.");
    }
} else {
    die("Tidak ada file diupload.");
}
