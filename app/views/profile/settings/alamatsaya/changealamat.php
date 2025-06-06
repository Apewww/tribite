<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
require_once AUTH;
include PARTIALS_PATH . 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user']['id'];
    $alamatBaru = htmlspecialchars(trim($_POST['alamatBaru']));
    
    if ($alamatBaru != '') {
        $stmt = $conn->prepare("CALL ChangeAlamat(?, ?)");
        $stmt->bind_param("is", $id, $alamatBaru);
        try {
            $stmt->execute();
            $_SESSION['notif'] = ["System", "Berhasil di Update!"];
        } catch (mysqli_sql_exception $e) {
            $_SESSION['notif'] = ["Warn", "Gagal update alamat: " . $e->getMessage()];
        }
        $stmt->close();
        include AUTH;
    } else {
        $_SESSION['notif'] = ["Warn", "Alamat tidak boleh kosong!"];
    }

    $conn->close();
    header('Location: /profile/settings/alamatsaya');
    exit;
} else {
    header('Location: /profile/settings/alamatsaya');
    exit;
}
?>
