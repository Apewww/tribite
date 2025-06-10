<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
require_once AUTH;
include PARTIALS_PATH . 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user']['id'];
    $emailBaru = htmlspecialchars(trim($_POST['emailBaru']));
    
    if ($emailBaru != '') {
        $stmt = $conn->prepare("CALL ChangeEmail(?, ?)");
        $stmt->bind_param("is", $id, $emailBaru);
        try {
            $stmt->execute();
            $_SESSION['notif'] = ["System", "Berhasil di Update!"];
        } caatch (mysqli_sql_exception $e) {
            $_SESSION['notif'] = ["Warn", "Gagal update email: " . $e->getMessage()];
        }
        $stmt->close();
        include AUTH;
    } else {
        $_SESSION['notif'] = ["Warn", "Email tidak boleh kosong!"];
    }

    $conn->close();
    header('Location: /profile/settings/keamanandanakun');
    exit;
} else {
    header('Location: /profile/settings/keamanandanakun');
    exit;
}
?>
