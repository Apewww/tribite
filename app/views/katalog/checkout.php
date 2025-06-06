<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
require_once AUTH;
include PARTIALS_PATH . 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $id = $_SESSION['user']['id'];
    $data = $_POST['dataCheckout'];
    foreach ($data as $item) {
        echo "Produk: " . htmlspecialchars($item['nama']) . ", Jumlah: " . htmlspecialchars($item['jumlah']) . "<br>";
    }
    
    // if ($telpBaru != '') {
    //     $stmt = $conn->prepare("CALL ChangeTelp(?, ?)");
    //     $stmt->bind_param("is", $id, $telpBaru);
    //     try {
    //         $stmt->execute();
    //         $_SESSION['notif'] = ["System", "Berhasil di Update!"];
    //     } catch (mysqli_sql_exception $e) {
    //         $_SESSION['notif'] = ["Warn", "Gagal update telepon: " . $e->getMessage()];
    //     }
    //     $stmt->close();
    //     include AUTH;
    // } else {
    //     $_SESSION['notif'] = ["Warn", "Telepon tidak boleh kosong!"];
    // }

    // $conn->close();
    // header('Location: /profile/settings/keamanandanakun');
    // exit;
} else {
    // header('Location: /profile/settings/keamanandanakun');
    // exit;
}
?>
