<?php
if (!isset($_SESSION['user'])) {
    header('Location: /home');
    exit;
}

if ($_SESSION['user']['role'] != 1) {
    header('Location: /home');
    exit;
}
?>
