<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header('Location: /home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password']; 
    $bitepay = $_POST['bite_pay'];
    $point = $_POST['point'];

    if ($password !== '') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashedPassword = '';
    }

    $stmt = $conn->prepare("CALL UpdateAkun(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssii", $id, $nama, $email, $role, $hashedPassword, $bitepay, $point);
    
    try {
        $stmt->execute();
        $_SESSION['notif'] = ["System", "Berhasil di Update!"];
        $_SESSION['user']['role'] = $role;
    } catch (mysqli_sql_exception $e) {
        $_SESSION['notif'] = ["Warn", "Gagal update akun: " . $e->getMessage()];
    }

    $stmt->close();
    $conn->close();

    header('Location: /akun');
    exit;
}
?>