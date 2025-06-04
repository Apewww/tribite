<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$userId = $_SESSION['user']['id'];
$pdo = new PDO(DSN, DB_USER, DB_PASS);

// Ambil path gambar lama
$stmt = $pdo->prepare("SELECT picture FROM akun WHERE id = ?");
$stmt->execute([$userId]);
$oldPath = $stmt->fetchColumn();

// Hapus file lama
if ($oldPath && file_exists($_SERVER['DOCUMENT_ROOT'] . $oldPath)) {
    unlink($_SERVER['DOCUMENT_ROOT'] . $oldPath);
}

// Kosongkan field picture
$stmt = $pdo->prepare("UPDATE akun SET picture = '' WHERE id = ?");
$stmt->execute([$userId]);

$_SESSION['user']['picture'] = '';

echo json_encode(['success' => true]);
