<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';

if (!isset($_SESSION['user'])) {
    // Redirect atau beri pesan jika belum login
    header('Location: /login.php');
    exit;
}

$akun_id = $_SESSION['user']['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $akun_id = $_SESSION['user']['id'];
    $tanggal = date('Y-m-d');
    $hari = date('w');
    $poin_hari = [150, 50, 60, 60, 100, 100, 150]; // Minggu - Sabtu
    $poin = $poin_hari[$hari];

    if ($akun_id <= 0) {
        die("❌ ID akun tidak valid.");
    }

    $cek = mysqli_query($conn, "SELECT 1 FROM akun WHERE id = $akun_id AND date = '$tanggal'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: harian");
        exit;
    }

    $query = mysqli_query($conn, "UPDATE akun SET date = '$tanggal', point = point + $poin WHERE id = $akun_id");
    if ($query) {
        $_SESSION['user']['point'] += $poin;
        header("Location: harian");
        exit;
    } else {
        die("❌ Gagal menyimpan absen: " . mysqli_error($conn));
    }
} else {
    echo "❌ Akses tidak sah.";
}