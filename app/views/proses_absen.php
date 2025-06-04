<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $akun_id = intval($_POST['akun_id'] ?? 0);
    $tanggal = date('Y-m-d');
    $hari = date('w');
    $poin_hari = [150, 50, 60, 60, 100, 100, 150]; // Minggu - Sabtu
    $poin = $poin_hari[$hari];

    if ($akun_id <= 0) {
        die("❌ ID akun tidak valid.");
    }

    // Cek apakah sudah absen
    $cek = mysqli_query($conn, "SELECT 1 FROM akun WHERE id = $akun_id AND date = '$tanggal'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: harian.php?id=$akun_id");
        exit;
    }

    // Tambahkan absen
    $query = mysqli_query($conn, "INSERT INTO akun (id, date , point) VALUES ($akun_id, '$tanggal', $poin)");
    if ($query) {
        header("Location: harian.php?id=$akun_id");
        exit;
    } else {
        die("❌ Gagal menyimpan absen: " . mysqli_error($conn));
    }
} else {
    echo "❌ Akses tidak sah.";
}