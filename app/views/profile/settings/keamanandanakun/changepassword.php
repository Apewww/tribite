<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user']['id'];
    $passwordlama = htmlspecialchars(trim($_POST['passwordlama']));
    $passwordbaru = htmlspecialchars(trim($_POST['passwordbaru']));
    
    if ($passwordlama != '' && $passwordbaru != '') {

        if (password_verify($passwordlama, $_SESSION['user']['password'])) {

            $hashedPasswordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("CALL ChangePassword(?, ?)");
            $stmt->bind_param("is", $id, $hashedPasswordbaru);

            try {
                $stmt->execute();
                $_SESSION['notif'] = ["System", "Berhasil di Update!"];
            } catch (mysqli_sql_exception $e) {
                $_SESSION['notif'] = ["Warn", "Gagal update password: " . $e->getMessage()];
            }

            $stmt->close();

        } else {
            $_SESSION['notif'] = ["Warn", "Password lama salah!"];
        }

    } else {
        $_SESSION['notif'] = ["Warn", "Password tidak boleh kosong!"];
    }

    $conn->close();
    header('Location: /profile/settings/keamanandanakun');
    exit;
} else {
    header('Location: /profile/settings/keamanandanakun');
    exit;
}
?>
