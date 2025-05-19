<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/app/views/';

switch ($request) {
    case '/home':
        require __DIR__ . $viewDir . 'landing.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . 'login.php';
        break;

    case '/menu':
        require __DIR__ . $viewDir . 'menu.php';
        break;

    case '/profile':
        require __DIR__ . $viewDir . 'profile.php';
        break;

    case '/keranjang':
        require __DIR__ . $viewDir . 'keranjang.php';
        break;

    case '/register':
        require __DIR__ . $viewDir . 'register.php';
        break;

    case '/notifikasi':
        require __DIR__ . $viewDir . 'notifikasi.php';
        break;

    case '/voucher':
        require __DIR__ . $viewDir . 'voucher.php';
        break;

    case '/dashboard':
        require __DIR__ . $viewDir . 'dashboard.php';
        break;
        
    case '/katalogmanage':
        require __DIR__ . $viewDir . 'katalogmanage.php';
        break;

    case '/akun':
        require __DIR__ . $viewDir . 'akun.php';
        break;

    case '/bahasa':
        require __DIR__ . $viewDir . 'bahasa.php';
        break; 
        
    case '/metodepembayaran':
        require __DIR__ . $viewDir . 'metodepembayaran.php';
        break;
        
    case '/pengaturanakun':
        require __DIR__ . $viewDir . 'pengaturanakun.php';
        break;     

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}