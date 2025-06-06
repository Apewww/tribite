<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
require_once AUTH;
include PARTIALS_PATH . 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['notif'] = ["System", "Terimakasih sudah melakukan pembelian!"];
    $redirect = "/menu";
} else {
    $_SESSION['notif'] = ["Error", "Terjadi Masalah!"];
    $redirect = "/menu";
}
?>

<script>
  localStorage.removeItem('keranjang');
  window.location.href = "<?= $redirect ?>";
</script>
