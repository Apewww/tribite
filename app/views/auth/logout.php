<?php 
session_start();
if (isset($_SESSION['user']['nama'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: /login");
    exit;
} else {
    session_destroy();
    header("Location: /login");
    exit;
}
        
?>