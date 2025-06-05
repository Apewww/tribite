<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
require_once AUTH;
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user']['id'];
    $telpBaru = htmlspecialchars(trim($_POST['telpBaru']));
    
    if ($telpBaru != '') {
        $stmt = $conn->prepare("CALL ChangeTelp(?, ?)");
        $stmt->bind_param("is", $id, $telpBaru);
        try {
            $stmt->execute();
            $_SESSION['notif'] = ["System", "Berhasil di Update!"];
        } catch (mysqli_sql_exception $e) {
            $_SESSION['notif'] = ["Warn", "Gagal update telepon: " . $e->getMessage()];
        }
        $stmt->close();
        include AUTH;
    } else {
        $_SESSION['notif'] = ["Warn", "Telepon tidak boleh kosong!"];
    }

    $conn->close();
    header('Location: /profile/settings/keamanandanakun');
    exit;
} else {
    header('Location: /profile/settings/keamanandanakun');
    exit;
}
?>
